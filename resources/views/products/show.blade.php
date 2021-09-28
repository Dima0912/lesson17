@extends('layouts.app')
<!-- {{--@inject('wishlist', 'App\Services\WishListService')--}} -->

@section('content')
<div class="row juctify-content-center">
    <div class="col-md-12">
        <h3 class="text-center">{{__($product->title) }} </h3>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        @if($product->thumbnail)
        <img src="{{ $product->thumbail }}" class="card-img-top" style="width: 200px; height: 300px; margin: 0 auto; display:block;">
        @endif
    </div>
    <div class="col-md-6">
        <p>Price: {{ $product->price }}$</p>
        <p>SKU: {{ $product->SKU }}$</p>
        <p>In stock: {{ $product->in_stock }}</p>
        <!-- <p>Reting: {{ $product->averageRating}}</p> -->
        <hr>
        <div>
            <p>Product Category: <b>{{ $product->category->name }}</b></p>
        </div>
        @auth
        @if($product->in_stock > 0)
        <hr>
        <div>
            <!-- <form action="{{ route('cart.add', $product) }}" method="POST" class="form-inline"> -->
            @csrf
            @method('post')
            <div class="form-group mx-sm-3 mb-2">
                <input type="hidden" name="price_with_discount" value="">
                <label for="products_count" class="sr-only">Count: </label>
                <input type="number" name="product_count" class="form-control" min="1" max="{{ $product->in_stock }}" value="1">
            </div>
            <button type="submit" class="btn-primary mb-2">Buy</button>
            </form>
        </div>
        @endif

        <form class="form-horizontal postsarts" action="{{ route('rating.add', $product) }}" id="addStr" method="POST">
            @csrf
            <div class="form-group required">
                <div class="col-sm-12">
                    @if(!is_null($product->getUserRatingCurrentProduct()))
                    @for($i = 5; $i >= 1; $i--)
                    <input class="star star-{{$i}}" value="{{$i}}" id="star-{{$i}}" type="radio" name="star" $i==$product->getUserRatingCurrentProduct()->rating
                    ? 'checked'
                    : ''
                    <label class="star star{{($i)}}" for="star-{{$i}}"></label>
                    @endfor
                    @else
                    <input class="star star-5" value-"5" id="star-5" type="radio" name="star">
                    <label class="star star-5" for-"star-5"></label>
                    <input class="star star-4" value-"4" id="star-4" type="radio" name="star">
                    <label class="star star-4" for-"star-4"></label>
                    <input class="star star-3" value-"3" id="star-3" type="radio" name="star">
                    <label class="star star-3" for-"star-3"></label>
                    <input class="star star-2" value-"2" id="star-2" type="radio" name="star">
                    <label class="star star-2" for-"star-2"></label>
                    <input class="star star-1" value-"1" id="star-1" type="radio" name="star">
                    <label class="star star-1" for-"star-1"></label>
                    @endif
                </div>
            </div>
        </form>
        <hr>
        @if($wishlist->isUserFollowed($product))
        <form action="{{ route('wishlist.delete', $product) }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-danger" value="Remove">
        </form>
        @else
        <a href="{{ route('wishlist.add', $product) }}" class="btn btn-success">{{ __('Add to Wish List') }}</a>
        @endif
        @endauth
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-2">
        <h4>Description: </h4>
        <p>{{ $product->descripton }}</p>
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