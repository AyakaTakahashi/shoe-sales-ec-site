@extends('layouts.app')

@section('content')
<div class="container">
    <h1>注文履歴</h1>
    <div class="container mt-4">
        <a href="{{ route('products.index') }}">トップ</a> > <a href="{{ route('users.index') }}">会員情報一覧</a> > 注文履歴
        <hr>
        <ul>
            <li><label for="order_id">注文番号: {{ $order->id }}</label><br></li>
            <li><label for="order_id" class="mt-2">お名前: {{ $order->user->name }}</label></li>
            <li><label for="shipping" class="mt-2">配送先: {{ $order->shipping_postal_code }}{{ $order->shipping_address }}</label></li>
            <li><label for="shipping" class="mt-2">電話番号: {{ $order->shipping_phone }}</label></li>
            <li><label for="shipping" class="mt-2">支払い方法: {{ $order->paymentMethod->name }}</label></li>
        </ul>
        <hr>
        @foreach(@$order_details as $detail)
        <div class="container coloum w-100 d-flex mt-2">
            <div class="col-3">
                <img src="{{ asset($detail->product->path)}}" class="w-100 img-fluid">
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center ms-2">
                <p>{{ $detail->product->name }}</p>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <p>{{ $detail->price }}</p>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <p>{{ $detail->qty }}</p>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <p>¥{{ $detail->price * $detail->qty }}</p>
            </div>
        </div>
        <hr>
        @endforeach
        <div class="d-flex">
            <div class="col-8">
            </div>
            <div class="col-2 d-flex justify-content-center">
                <h3>合計</h3>
            </div>
            <div class="col-2 d-flex justify-content-center">
                <h3>¥{{ number_format($order->total_amount) }}</h3>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection