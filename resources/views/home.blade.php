@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2>Products</h2>

    @if(Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div class="alert alert-success" role="alert">
                {{ Session::get('success')}}
            </div>
        </div>
    </div>
    @endif

    <div class="row">

        @foreach ($allProducts as $product)

    <div class="col-3">
        <div class="card">
            <img class="card-img-top" src="{{asset ('default.jpg')}}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">{{$product->name}}</h4>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">${{$product->price}}</p>
            </div>
            <div class="card-body">
                <a href="{{ route('product.addToCart', $product->id) }}" class="card-link">Add to cart</a>
            </div>
        </div>
    </div>
        @endforeach



    </div>
</div>
@endsection
