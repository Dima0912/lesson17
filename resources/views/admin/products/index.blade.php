@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center">{{ __('Products') }}</h3>
        </div>
        <div class="col-md-12">
            if (sessiom('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <div class="col-md-12">
            <table class="table align-self-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Id</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Quantity</th>
                        <th class="text-center" scope="col">Category</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center" scope="col">{{ $product->id }}</td>
                        <td class="text-center" scope="col">{{ $product->title }}</td>
                        <td class="text-center" scope="col">{{ $product->in_stock }}</td>
                        <td class="text-center" scope="col">@include('categories.parts.category.view')</td>
                        <td class="text-center" scope="col">{{ $product->id }}</td>
                        <td class="text-center" scope="col">
                            <a href="{{ route('admin.products.edit', $product)}}" class="bth btn-info form-control">Edit</a>
                            <form action="{{ ('route.produts.delete', $product) }}" method="POST">
                                @scrf
                                @method('DELETE')
                                <input type="submit" class="btn-danger form-control" value="Remove">
                            </form>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-success form-control">View</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{ $product->links() }}
        </div>
    </div>
</div>