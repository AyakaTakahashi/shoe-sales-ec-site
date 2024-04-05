@extends('layouts.app')

@section('content')
<div class="container">
    <h1>会員情報 更新</h1>
    <div class="container mt-4">
        @if($user!== null)
        <a href="{{ route('products.index') }}">トップ</a> > <a href="{{ route('users.index') }}">会員情報一覧</a> > {{$user->name}}様
        <hr>
        @endif
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user-name">お名前</label><span class="ec-site-required">*</span>
                <input type="text" name="name" id="user-name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>お名前を入力してください</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="user-email">メールアドレス</label><span class="ec-site-required">*</span>
                <input type="text" name="email" id="user-email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>メールアドレスを入力してください</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="user-postal_code">郵便番号</label><span class="ec-site-required">*</span>
                <input type="text" name="postal_code" id="user-postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ $user->postal_code }}">
                @error('postal_code')
                <span class="invalid-feedback" role="alert">
                    <strong>郵便番号を入力してください</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="user-address">住所</label><span class="ec-site-required">*</span>
                <input type="text" name="address" id="user-address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>住所を入力してください</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="user-phone">電話番号</label><span class="ec-site-required">*</span>
                <input type="number" name="phone" id="user-phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>電話番号を入力してください</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">会員情報を保存する</button>
        </form>
        <div class="mt-1">
            <a href="{{ route('users.index') }}">会員情報ページに戻る</a>
        </div>
    </div>
</div>
@endsection