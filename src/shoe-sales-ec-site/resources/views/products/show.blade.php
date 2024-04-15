@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="row w-75">
        <!-- 成功メッセージを表示 -->
        @if (session('success'))
        <div class="alert alert-success w-75" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="col-5 offset-1">
            <img src="{{ asset($product->path)}}" class="w-100 img-fluid">
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
            <div class="m-3 d-flex align-items-end">
                @auth
                <form method="POST" action="{{ route('cart.add') }}">
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <div class="row">
                        <div class="form-group col-12 col-md">
                            <label for="quantity" class="col-form-label">数量</label>
                            <input type="number" id="qty" name="qty" min="1" value="1" class="form-control">
                        </div>
                        <div class="col-12 col-md-auto d-flex align-items-center" style="margin-top: 32px;">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                カートに追加
                            </button>
                        </div>
                    </div>
                </form>
                @endauth
                @auth
                <form method="POST" action="{{ route('products.favorite', $product->id) }}">
                    @csrf
                    <!-- お気に入り登録されているかをチェック -->
                    @if($product->isFavoritedByAuthUser())
                    <button type="submit" class="btn btn-danger ms-1">
                        <i class="fas fa-heart"></i>
                    </button>
                    @else
                    <button type="submit" class="btn border-danger ms-1">
                        <i class="far fa-heart" style="color:red;"></i>
                    </button>
                    @endif
                </form>
                @endauth
            </div>
        </div>
        <input type="hidden" name="weight" value="0">
    </div>
    @endauth
</div>
<div class="d-flex justify-content-center">
    <div class="row w-75">
        <div class="offset-1 col-11">
            <hr>
            <h3 class="float-left">カスタマーレビュー</h3>
        </div>
        <div class="offset-1 col-10">
            <div class="row">
                @foreach($reviews as $review)
                <div class="offset-md-5 col-md-5">
                    <h5>{{$review->content}}</h5>
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
                        <h3>レビュー内容</h3>
                        @error('content')
                        <strong>レビュー内容を入力してください</strong>
                        @enderror
                        <textarea name="content" class="form-control m-2"></textarea>
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn btn-success">レビューを追加</button>
                        </div>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection