@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center mt-3">
    <!-- 成功メッセージを表示 -->
    @if (session('success'))
    <div class="alert alert-success w-75" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="w-75">
        <h1>会員情報</h1>
        <hr>
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-user fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-2 mt-3">
                        <div class="d-flex flex-column ms-2">
                            <label for="user-name">会員情報の編集</label>
                            <p>登録情報を変更できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('users.edit') }}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-lock fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-2 mt-3">
                        <div class="d-flex flex-column ms-2">
                            <label for="user-name">パスワードの変更</label>
                            <p>パスワードを更新できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('users.update_password') }}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-shopping-cart fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">注文履歴の確認</label>
                            <p>過去の注文履歴を確認できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('users.edit') }}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-sign-out-alt fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ms-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">ログアウト</label>
                            <p>靴販売サイトからログアウトします</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('users.edit') }}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<script>
    // このスクリプトはログアウトの機能を模倣します。実際のログアウト処理はサーバー側で行う必要があります。
    function logout() {
        // ここで実際のログアウト処理を行う
        // 例: location.href = 'logout.path';
        console.log("ログアウト処理をここで実装");
    }
</script>

</div>

@endsection