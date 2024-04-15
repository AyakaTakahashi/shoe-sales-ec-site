@extends('layouts.app')

@section('content')
<div class="container">
    <h1>注文履歴</h1>
    <div class="container mt-4">
        <a href="{{ route('products.index') }}">トップ</a> > <a href="{{ route('users.index') }}">会員情報一覧</a> > 注文履歴
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">注文番号</th>
                    <th scope="col">注文日時</th>
                    <th scope="col">合計金額</th>
                    <th scope="col">支払い方法</th>
                    <th scope="col">詳細</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderHistory as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ number_format($order->total_amount) }}円</td>
                    <td>{{ $order->paymentMethod->name }}</td>
                    <td><a href="{{ route('users.order_history_detail', ['order_id' => $order->id]) }}">詳細を見る</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection