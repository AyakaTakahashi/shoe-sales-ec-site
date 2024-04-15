<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use App\Models\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $shoppingCart = ShoppingCart::with('product')
            ->where('user_id', $user->id)
            ->where('buy_flag', false)
            ->get();

        $groupedCartProducts = [];
        $total_amount = 0;

        foreach ($shoppingCart as $cart) {
            if (!isset($groupedCartProducts[$cart->product_id])) {
                $total_amount = 0;
                $groupedCartProducts[$cart->product_id] = [
                    'product_id' => $cart->product_id,
                    'name' => $cart->product->name,
                    'price' => $cart->price,
                    'qty' => 0,
                    'subtotal' => 0,
                    'path' => $cart->product->path,
                ];
            }
            $groupedCartProducts[$cart->product_id]['qty'] += $cart->qty;
            $groupedCartProducts[$cart->product_id]['subtotal'] += $cart->qty * $cart->price;
        }

        foreach ($groupedCartProducts as $groupedCartProduct) {
            $total_amount += $groupedCartProduct['subtotal'];
        }

        return view('cart.index', compact('groupedCartProducts', 'total_amount'));
    }

    //カートに商品を追加
    public function addToCart(Request $request)
    {
        $shoppingCart = new ShoppingCart();
        $shoppingCart->user_id = Auth::id();
        $shoppingCart->product_id = $request->id;
        $shoppingCart->price = $request->price;
        $shoppingCart->qty = $request->qty;
        $shoppingCart->buy_flag = false;
        $shoppingCart->save();

        return back()->with('success', 'カートに商品が追加されました。');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
