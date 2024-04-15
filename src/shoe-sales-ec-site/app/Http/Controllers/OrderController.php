<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $paymentMethod = PaymentMethod::all();
        return view('orders.checkout', compact('user', 'paymentMethod'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'shipping_postal_code' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
        ], [
            'shipping_postal_code.required' => '配送先郵便番号を入力してください。',
            'shipping_address.required' => '配送先住所を入力してください。',
            'shipping_phone.required' => '配送先電話番号を入力してください。',
        ]);

        $user = Auth::user();

        //カート情報の取得
        $shoppingCart = ShoppingCart::with('product')
            ->where('user_id', $user->id)
            ->where('buy_flag', false)
            ->get();

        $total_amount = 0;
        $orderDetails = [];

        foreach ($shoppingCart as $cart) {
            if (!isset($orderDetails[$cart->product_id])) {
                $orderDetails[$cart->product_id] = [
                    'product_id' => $cart->product_id,
                    'name' => $cart->product->name,
                    'price' => $cart->price,
                    'qty' => 0,
                    'subtotal' => 0,
                ];
            }
            $orderDetails[$cart->product_id]['qty'] += $cart->qty;
            $orderDetails[$cart->product_id]['subtotal'] += $cart->qty * $cart->price;
        }

        foreach ($orderDetails as $detail) {
            $total_amount += $detail['subtotal'];
        }
        DB::beginTransaction();
        try {
            //注文情報の作成
            $order = new Order();
            $order->user_id = $user->id;
            $order->total_amount = $total_amount;
            $order->shipping_postal_code = $request->input('shipping_postal_code');
            $order->shipping_address = $request->input('shipping_address');
            $order->shipping_phone = $request->input('shipping_phone');
            $order->payment_method_id = $request->input('payment_method');
            $order->save();

            //注文詳細の作成
            foreach ($orderDetails as $detail) {
                $order->orderDetails()->create([
                    'product_id' => $detail['product_id'],
                    'price' => $detail['price'],
                    'qty' => $detail['qty'],
                ]);
            }

            foreach ($shoppingCart as $cart) {
                $cart->buy_flag = true;
                $cart->save();
            }

            DB::commit();
            return redirect()->route('orders.complete', ['order_id' => $order->id]);
        } catch (Exception $e) {
            DB::rollback();
            return back()->withInput();
        }
    }

    public function showOrderComplete(Request $request)
    {
        $order = Order::with('paymentMethod')->findOrFail($request->order_id);
        $order_details = $order->orderDetails()->with('product')->get();
        return view('orders.complete', compact('order', 'order_details'));
    }
}
