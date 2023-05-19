@extends('app')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <div class="flex d-flex justify-content-around my-4">

        <a href="{{ route('clientindex') }}">Go Back!</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myProduct-{{ $product->id }}">
            Show Modal
        </button>
        @include('added_components.productmodal')
    </div>
    <div class="flex d-flex justify-content-around my-4">

        <img class="img-fluid" src="{{ asset('images/' . $product->image) }}" alt="" style="width:50%; height:500px">

        <div class="flex-r mx-5">

            <h1>{{ $product->name }}</h1>
            <p>Category: <span>{{ $product->category->name }}</span></p>
            <p>{{ $product->description }}</p>
            <p>Price: {{ number_format($product->price) }}</p>
            <p>In Stock: {{ $product->in_stock }}</p>


            {{-- @if (!($user->isAdmin == 1)) --}}


            <form action="{{ route('cartAdd') }}" method="POST" class="mt-2">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product->id }} ">

                <input type="number" name="quantity" value="0" />


                @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                @auth

                    <button type="submit" class="btn btn-secondary">Add to Cart</button>
                @else
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add to Cart
                    </button>
                    @include('added_components.loginform')
                @endauth

            </form>
            <a href="{{ route('buyproduct', $product->id) }}" class="btn btn-primary">Buy Now</a>
            {{-- @endif --}}
           

        </div>
        
    </div>

        
    <div class="comments p-5">

        {{-- @auth
            @include('added_components.commentform')
        @endauth --}}


        @include('added_components.comments')
        
    </div>

   
@endsection
