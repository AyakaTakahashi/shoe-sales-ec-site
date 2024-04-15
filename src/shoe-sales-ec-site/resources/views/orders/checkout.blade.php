@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center mt-3">
    <div class="w-100">
        <h1>購入手続き</h1>
        <hr>
        <div class="container mt-4">
            <form action="{{ route('orders.create',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-2">
                    <label for="user-name">お名前</label>
                    <input type="text" name="name" id="user-name" class="form-control" value="{{ $user->name }}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="user-shipping_postal_code">配送先 郵便番号</label><span class="ec-site-required">*</span>
                    <input type="text" name="shipping_postal_code" id="user-shipping_postal_code" class="form-control @error('shipping_postal_code') is-invalid @enderror" value="{{ $user->shipping_postal_code }}">
                </div>
                @error('shipping_postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group mt-2">
                    <label for="user-shipping_address">配送先 住所</label><span class="ec-site-required">*</span>
                    <input type="text" name="shipping_address" id="user-shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" value="">
                </div>
                @error('shipping_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group mt-2">
                    <label for="user-shipping_phone">配送先 電話番号</label><span class="ec-site-required">*</span>
                    <input type="number" name="shipping_phone" id="user-shipping_phone" class="form-control @error('shipping_phone') is-invalid @enderror" value="">
                </div>
                @error('shipping_phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="mt-2">
                    <label for="payment_method">支払い方法</label><span class="ec-site-required">*</span>
                    @foreach($paymentMethod as $payment)
                    <div>
                        <input type="radio" name="payment_method" id="{{ $payment->id }}" value="{{ $payment->id }}" @if($payment->id == 1) checked @endif>
                        <label for="{{ $payment->id }}">{{ $payment->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="btn btn-primary mt-1" id="checkout_order" data-bs-toggle="modal" data-bs-target="#OrderConfirmationModal">購入を確定する</div>
                <div class="modal fade" id="OrderConfirmationModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header justify-content-between">
                                <h5 class="modal-title" id="staticBackdropLabel">購入を確定しますか？</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-primary">注文を確定する</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection