@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center mt-3">
    <div class="w-75">
        <h1>注文が完了しました</h1>
        <hr>
        <ul>
            <li><label for="order_id">注文番号: {{ $order->id }}</label><br></li>
            <li><label for="order_id" class="mt-2">お名前: {{ $order->user->name }}</label></li>
            <li><label for="shipping" class="mt-2">配送先: {{ $order->shipping_postal_code }}{{ $order->shipping_address }}</label></li>
            <li><label for="shipping" class="mt-2">電話番号: {{ $order->shipping_phone }}</label></li>
            <li><label for="shipping" class="mt-2">支払い方法: {{ $order->paymentMethod->name }}</label></li>
        </ul>
        <hr>
        <div class="d-flex">
            <div class="col-6">
            </div>
            <div class="col-2 d-flex justify-content-center">
                <h3>単価</h3>
            </div>
            <div class="col-2 d-flex justify-content-center">
                <h3>数量</h3>
            </div>
            <div class="col-2 d-flex justify-content-center">
                <h3>合計</h3>
            </div>
            <hr>
        </div>
        @foreach(@$order_details as $detail)
        <div class="container coloum w-100 d-flex mt-2">
            <div class="col-3">
                <img src="{{ asset($detail->product->path)}}" class="w-100 img-fluid">
            </div>
            <div class="col-3 d-flex align-items-center justify-content-center ms-2">
                <p>{{ $detail->product->name }}</p>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <p>{{ number_format($detail->price) }}</p>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <p>{{ $detail->qty }}</p>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <p>¥{{ number_format($detail->price * $detail->qty) }}</p>
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