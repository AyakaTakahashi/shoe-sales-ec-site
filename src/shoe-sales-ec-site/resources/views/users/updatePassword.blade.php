@extends('layouts.app')

@section('content')
<div class="container">
    <h1>パスワード 更新</h1>
    <div class="container mt-4">
        @if($user!== null)
        <a href="{{ route('products.index') }}">トップ</a> > <a href="{{ route('users.index') }}">会員情報一覧</a> > パスワード更新
        <hr>
        @endif
        <form action="{{ route('users.update_password',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="current_password">現在のパスワード</label><span class="ec-site-required">*</span>
                <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="現在のパスワードを入力してください" value="">
                @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="new_password">新しいパスワード</label><span class="ec-site-required">*</span>
                <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="新しいパスワードを入力してください" value="">
                @error('new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="new_password_confirmation">新しいパスワード（確認用）</label><span class="ec-site-required">*</span>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="入力確認のため、新しいパスワードを入力してください" value="">
                @error('new_password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger mt-2">パスワードを更新する</button>
        </form>
        <div class="mt-1">
            <a href="{{ route('users.index') }}">会員情報ページに戻る</a>
        </div>
    </div>
</div>
@endsection