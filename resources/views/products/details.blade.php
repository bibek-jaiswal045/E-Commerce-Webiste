@extends('app')
@section('title')
{{$product->name}}
@endsection
@section('content')
        {{-- <a href="{{return back()}}">Go Back!</a> --}}
        <div class="flex d-flex justify-content-around my-4">
            
                <img class="img-fluid" src="{{asset('images/' . $product->image)}}" alt="" style="width:50%; height:500px">

            <div class="flex-r mx-5">

                <h1>{{$product->name}}</h1>
                <h4>Category: {{$product->category->name}}</h4>
                <p>{{$product->description}}</p>
                <p>Price: {{number_format($product->price)}}</p>
                <p>In Stock: {{$product->in_stock}}</p>

            </div>
        </div>

       
        



@endsection


