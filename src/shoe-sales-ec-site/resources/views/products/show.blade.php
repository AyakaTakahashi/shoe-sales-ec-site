@extends('layouts.app')
 
@section('content')

<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="col-5 offset-1">
            <img src="{{ asset('img/mens_sneaker.jpg')}}" class="w-100 img-fluid">
        </div>
        <div class="col">
            <div class="d-flex flex-column">
                <h1 class="">{{$product->name}}</h1>
                <p class="">{{$product->description}}</p>
                <hr>
                    <p class="d-flex align-items-end">
                    ￥{{$product->price}}(税込)
                </p>
                <hr>
            </div>
            @auth
            <form method="POST" class="m-3 align-items-end">
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="name" value="{{$product->name}}">
                <input type="hidden" name="price" value="{{$product->price}}">
                <div class="row">
                    <div class="form-group col-12 col-md">
                        <label for="quantity" class="col-form-label">数量</label>
                        <input type="number" id="quantity" name="qty" min="1" value="1" class="form-control">
                    </div>
                    <div class="col-12 col-md-auto">
                        <button type="submit" class="btn btn-primary w-100" style="margin-top: 32px;">
                            <i class="fas fa-shopping-cart"></i>
                            カートに追加
                        </button>
                    </div>
                </div>
                <input type="hidden" name="weight" value="0">
            </form>
            @endauth
        </div>
        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">カスタマーレビュー</h3>
        </div>
        <div class="offset-1 col-10">
            <div class="row">
                @foreach($reviews as $review)
                <div class="offset-md-5 col-md-5">
                    <p class="h5">{{$review->content}}</p>
                    <label>{{$review->created_at}} {{$review->user->name}}</label>
                </div>
                @endforeach
            </div>
            <br />
            @auth
            <div class="row">
                <div class="offset-md-5 col-md-5">
                    <form method="POST" action="{{ route('reviews.store') }}">
                        @csrf
                        <h4>レビュー内容</h4>
                        @error('content')
                             <strong>レビュー内容を入力してください</strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                         <input type="hidden" name="product_id" value="{{$product->id}}">
                         <button type="submit" class="btn btn btn-success">レビューを追加</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
