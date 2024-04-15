@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center mt-3">
    <div class="w-100">
        <h1>お気に入り一覧</h1>
        <hr>
        @if ($favoriteProducts ->isEmpty())
        <div class="alert alert-success w-75" role="alert">
            お気に入りに商品が登録されていません
        </div>
        @endif
        <div class="container mt-4">
            <div class="row w-100">
                @foreach($favoriteProducts as $product)
                <div class="col-3">
                    <a href="{{route('products.show', $product)}}">
                        <img src="{{ asset($product->path)}}" class="img-favorite">
                    </a>
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <p class="mt-2">
                                {{$product->name}}<br>
                                <label>￥{{$product->price}}</label>
                                @auth
                            </p>
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
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection