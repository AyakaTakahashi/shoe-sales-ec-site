@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center mt-3">
    <div class="w-100">
        <h1>ショッピングカート</h1>
        <hr>
        @if(empty($groupedCartProducts))
        <p>カートに商品がありません。</p>
        @else
        <div class="container mt-4">
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
            @foreach($groupedCartProducts as $product)
            <div class="container coloum w-100 d-flex mt-1">
                <div class="col-3">
                    <img src="{{ asset($product['path']) }}" class="w-100 img-fluid">
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center ms-2">
                    <p>{{ $product['name'] }}</p>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <p>{{ $product['qty'] }}</p>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <p>{{ $product['qty'] }}</p>
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <p>¥{{ number_format($product['price'] * $product['qty']) }}</p>
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
                    <h3>¥{{ number_format($total_amount) }}</h3>
                </div>
                <hr>
            </div>
        </div>
        <div class="container d-flex justify-content-end mt-2">
            <a href="{{ route('products.index') }}" class="btn btn-outline-dark">お買い物を続ける</a>
            <a href="{{ route('orders.checkout') }}" class="btn btn-primary ms-1">購入手続きへ</a>
        </div>
        @endif
    </div>
</div>
@endsection