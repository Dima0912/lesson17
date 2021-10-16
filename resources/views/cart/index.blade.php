@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center">{{ __('Cart') }}</h3>
        </div>
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <div class="col-md-12">
            @if(Cart::instance('cart')->count() > 0)
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @each('cart.parts.product_view', Cart::instance('cart')->content(), 'row')
                </tbody>
            </table>
            @else
            <h3 class="text-center">There are no products ib cart</h3>
        </div>
    </div>
</div>