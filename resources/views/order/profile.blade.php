@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Profile of {{ Auth::user()->name }}</h1>
        <hr>
        <h2>Your orders</h2>
        <hr>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        {{$item['item']['name']}} │ {{$item['qty']}} x
                        <span class="badge">€{{$item['price']}}</span>

                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="panel-footer">Total price: € {{$order->cart->totalPrice}}</div>
            <hr>
        </div>
        @endforeach
    </div>
</div>

@endsection
