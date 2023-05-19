@extends('app')
@section('title')
Detail
@endsection
@section('content')

  
<div class="d-flex justify-content-between">
    <p>Ordered By: <span class=" text-primary">{{$user->name}}</span></p>
    <p>Go Back: <a href="{{route('dataproducts')}}">Click Here!</a></p>
</div>

  



<table class="table table-bordered">
    <tr>

        <th>Ordered Products</th>
        <th>Quantity</th>
        <th>Price(Rs.)</th>
        <th>Grand Price(Rs.)</th>
    </tr>

    @foreach ($user->carts as $cart)
            
        <tr>
            <td>  
                <a href="{{route('detailsellerproduct', $cart->product->id)}}" >{{$cart->product->name}}</a>
            </td>
            <td>{{$cart->quantity}}</td>
            <td>{{number_format($cart->product->price)}}</td>
            <td>
                @php
                $grand = $cart->quantity * $cart->product->price;
                @endphp
            
            {{number_format($grand)}}
            </td>
        </tr>
    @endforeach
    <tr>
        <td><span class="text-warning">Total</span></td>
        <td ><span class="text-warning">{{$user->carts->sum('quantity')}}</span></td>
        <td><span class="text-warning">
            @php
                $total = 0;
                foreach ($user->carts as $cart) {
                    $total +=  $cart->product->price;
                }
            @endphp
            {{number_format($total)}}
        </span>
        </td>

        <td>
            

                @php
                $gtotal = 0;
                
                foreach ($user->carts as $cart) {
                    $gtotal +=$cart->quantity * $cart->product->price;
                }
                
                
                @endphp
            <span class="text-warning">{{number_format($gtotal)}}</span>
        </td>
        {{-- <td><span class="text-warning">{{$user->carts->product->sum('price')}}</span></td> --}}
    </tr>
        
</table>


@endsection