@extends('layouts.app')


@section('content')

<div class="row">

@foreach ($sortedData as $product)

<div class="col-3">
    <div class="card">
        <img class="card-img-top" src="{{asset ('default.jpg')}}" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$product->name}}</h4>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">${{$product->price}}</p>
        </div>
        <div class="card-body">
            <a href="{{ route('cart.add', $product->id) }}" class="card-link">Add to cart</a>
        </div>
    </div>
</div>
    @endforeach

</div>
@endsection
