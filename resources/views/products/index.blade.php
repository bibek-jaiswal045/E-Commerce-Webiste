@extends('app')
@section('title')
Seller Side
@endsection


@section('content')


<div class="d-flex justify-content-between align-content-center my-5">

    <h1>All Products</h1>
     
    {{-- <div class="flex-m d-flex justify-content-between align-items-center"> --}}
        <div class="flex-m">
        <a href="{{route('homepage')}}" class="btn btn-primary">Homepage</a>
        <a href="{{route('categoryindex')}}" class="btn btn-primary">Categories</a>
        <a href="{{route('blogindex')}}" class="btn btn-primary">Blogs </a>

        <a href="{{route('createproducts')}}" class="btn btn-primary">Add Products</a>
        
        {{-- <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" data-bs-target="#dropdown-menu"  aria-expanded="false">
              Add
            </button>
            <ul id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a href="{{route('categoryindex')}}" class="dropwon-item">Categories</a></li>
              <li><a href="{{route('blogindex')}}" class="dropwon-item">Blogs </a></li>
              <li><a href="{{route('createproducts')}}" class="dropwon-item">Products</a></li>
            </ul>
          </div> --}}
        
        <a href="{{route('dataproducts')}}" class="btn btn-primary mx-3" style="height: 38px">Orders</a>
    </div>

    <div class="flex-r">
        <p class="text-success">{{auth()->user()->name}}</p>
        <form action="{{route('logout')}}" method="POST" class="my-4">
            @csrf
            <button class="btn btn-primary" type="submit">Log Out</button>
        </form>
    </div>
    
    
</div>

<table class="table table-stripped">

    <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Description</th>
        <th>In Stock</th>
        <th>Price(Rs.)</th>
        <th>Edit</th>
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
        <td>{{Str::Limit($product->description,10)}}</td>
        <td>
            @if($product->in_stock == 0)
            <span class="text-danger">Product Out of Stock! </span>
            @else
            {{$product->in_stock}}

            @endif
        </td>
        <td>{{number_format($product->price)}}</td>
        <td><a href="{{route('editproducts', $product->id)}}" class="btn btn-primary">Edit</a></td>
       


    </tr>
    
    @endforeach

</table>


@endsection