@extends('layouts.app')
{{--@inject('wishlist', 'App\Services\WishListService')--}}

@section('content')
<div class="row juctify-content-center">
    <div class="col-md-12">
        <h3 class="text-center">{{__($product->title) }} </h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        @if(Storage::has($product->thumbnail))
        <img src="{{ $product->thumbail }}" class="card-img-top" style="width: 200px; height: 300px; margin: 0 auto; display:block;">
        @endif
    </div>
    <div class="col-md-6">
        <p>Price: {{ $product->getPrice() }}$</p>
        <p>SKU: {{ $product->SKU }}$</p>
        <p>In stock: {{ $product->in_stock }}</p>
        <p>Reting: {{ $product->averageRating}}</p>
        <hr>
        <div>
            <p>Product Category: <b>{{ $product->category }}</b></p>
        </div>
        @auth
        @if($product->in_stock > 0)
        <hr>
        @endif
@endauth
<hr>
<div class="row">
    <div class="col-md-2">
        <h4>Description: </h4>
        <p>{{ $product->description }}</p>
    </div>
</div>
</div>
<script>
    $(function() {
$('#addStar').change('.star', function(e) {
    $(this).submit();
});
    });
</script>
@endsection