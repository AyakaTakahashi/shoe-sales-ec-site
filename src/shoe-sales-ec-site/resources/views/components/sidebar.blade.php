<div class="container" id="sidebar">
    <h3>おすすめの商品</h3>
    <label class="col-12 mt-1">
        <a href="">夏用ビジネスシューズ</a>
    </label>
    <label class="col-12 mt-1">
        <a href="">ホワイトデーのお返し</a>
    </label>
    <hr>
    @foreach ($major_category_names as $major_category_name)
    <h3 class="mt-3">{{ $major_category_name }}</h3>
    @foreach($categories as $category)
    @if($category->major_category_name === $major_category_name)
    <label class="col-12 mt-1">
        <a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a>
    </label>
    @endif
    @endforeach
    <hr>
    @endforeach
</div>