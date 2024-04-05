@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-9">
        <div class="container mt-4">
            @if($category !== null)
                <a href="{{ route('products.index') }}">トップ</a> > <a href="{{ route('products.index', ['category' => $category->id]) }}">{{$category->major_category_name}}</a> > {{$category->name}}
                <h1>{{$total_count}}件</h1>
            @endif
        </div>
        <div>
            並べ変え
            @sortablelink('id', 'ID')
            @sortablelink('price', 'Price')
        </div>
        <div class="container mt-4">
            <div class="row w-100">
                @foreach($products as $product)
                    <div class="col-3">
                        <a href="{{route('products.show', $product)}}">
                            <img src="{{ asset('img/mens_sneaker.jpg')}}" class="img-thumbnail">
                        </a>
                        <div class="row">
                            <div class="col-12">
                                <p class="samuraimart-product-label mt-2">
                                    {{$product->name}}<br>
                                    <label>￥{{$product->price}}</label>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>

@endsection