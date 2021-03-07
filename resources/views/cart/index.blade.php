@extends('layouts.app')

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach ($products as $product)
                        <li class="list-group-item">
                            <strong>{{$product['item']['name']}}</strong>
                            <span class="label label-success">€{{$product['price']}}</span>
                            <div class="btn group">
                                <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">+1</a></li>
                                    <li><a href="#">-1</a></li>
                                    <li><a href="#">Remove All</a></li>
                                </ul>
                            </div>
                            <span class="badge badge-dark">{{$product['qty']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <strong>Total:€ {{ $totalPrice }}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
    <div class="row">
        <div class="col-sm-6">
            <strong>No items in cart</strong>
        </div>
    </div>
    @endif
@endsection
