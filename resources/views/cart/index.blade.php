@extends('layouts.app')

@section('content')

    <h2>Your cart</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

    @foreach ($cartItems as $item)
                <tr>
                    <td scope="row">{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <form action="{{route('cart.update',$item->id)}}">

                            <input name="quantity" type="number" value="{{$item->quantity}}">

                            <input type="submit" value="Save">

                        </form>
                    </td>

                    <td>
                        <a href="{{ route( 'cart.destory', $item->id )}}">Delete</a>
                    </td>
                </tr>
            </tbody>
    @endforeach

        </table>
@endsection
