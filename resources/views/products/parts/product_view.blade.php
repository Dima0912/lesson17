<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        @if($product->thumbnail)
        <img src="{{$product->thumbnail}}" alt="" class="card-img-top" height="225" style="max-width: 100%; margin: 0 auto; display: block;">
        @endif 
        <div class="card-body">
            <p class="card-title">{{__($product->title) }}</p>
            <hr>
            <p class="card-text">{{__($product->short_description) }}</p>
            <div class="d-flex flex-colum justify-content-center align-items-start">
                <small class="text-muted mr-2">categories: </small>
                <div class="btn-group align-self-end">
                    @if(empty($product->categories))
                    @each('categories.parts.category', 'category' => $product->categories, 'category')
                    @endif
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('products.show', $product->id)}}" 
                        class="btn btn-sm btn-outline-dark">
                        {{__('Show')}}
                    </a>
                </div>
                <span class="text-muted">{{$product->getPrice()}}$</span>
            </div>
        </div>
    </div>

</div>