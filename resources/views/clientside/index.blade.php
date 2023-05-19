@extends('app')
@section('title')
Buyer Side
@endsection
@section('content')

<div class="head d-flex justify-content-between">
    <div class="head-l ">

        <h1>All Products</h1>
    </div>

    <div class="head-r">

         @if (!Auth::check())
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Sign Up
          </button>
        @include('added_components.loginform')
        
        <a href="{{route('login')}}" class="btn btn-primary" type="button">Log In</a>
        
        @else
            <span>{{Auth::User()->name}}</span>

            <form action="{{route('logout')}}" method="POST" class="my-4">
                @csrf
                <button class="btn btn-primary" type="submit">Log Out</button>
            </form>

            
        @endif
            

    </div>




</div>



<table class="table table-bordered text-center">
    <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Descripton</th>
        <th>In Stock</th>
        <th>Price(Rs.)</th>
        <th>Buy</th>
    </tr>

    

    @foreach ($products as $index=>$product)

        <tr>
            <td>{{++$index}}</td>
            <td>{{$product->name}}</td>
            <td>
                <a href="{{route('singlecategory', $product->category)}}">
                    {{$product->category->name}}
                </a>
            </td>
            <td>
                @if ($product->image)
                <img  class="img-fluid"  src="{{ asset('images/' . $product->image) }}" alt=""
                    style="width:200px; height:200px;">
                @endif
            </td>
            <td> {{Str::limit($product->description, 10)}}</td>
            <td>
                @if($product->in_stock == 0)
            <span class="text-danger">Product Out of Stock! </span>
            @else
            {{$product->in_stock}}

            @endif
            </td>
            <td>{{number_format($product->price)}}</td>
            <td>
                <a href="{{route('detailproducts', $product->id)}}" class="btn btn-info">More Details</a>


                <a href="{{route('buyproduct', $product->id)}}" class="btn btn-primary">Buy Now</a>

                
            </td>
        </tr>
    @endforeach

</table>




@endsection