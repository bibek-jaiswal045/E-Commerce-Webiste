@extends('app')
@section('title')
Add Product
@endsection


@section('content')

<h1 class="my-5">Edit Product</h1>


<form  action="{{route('updateproducts', $product->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf


<div class="form-group">

    <label class="my-3">Name</label>
    <input type="text" name="name" class="form-control" value="{{$product->name}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>


{{-- <div class="form-group">

    <label class="my-3">Category</label>
    <input type="text" name="category" class="form-control" value="{{$product->category->name}}">
    @error('category')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div> --}}



<div class="form-group">
    <label class="my-3">Category</label>
    
    <select class="form-select" aria-label="Default select example" name="category_id">
    @foreach ($categories as $category)
    <option  value="{{$category->id}}">{{$product->category->name}}</option>
        {{-- <option value="{{$category->id}}" >{{$category->name}}</option> --}}
    @endforeach

</select>
</div>





    <div class="form-group">

        
        <label class="my-3">Image</label>
        <input type="file" name="image" class="form-control">
        @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    
    <div class="form-group">

        
        <label class="my-3">Description</label>
        <textarea name="description" cols="30" rows="8" class="form-control"  value="{{$product->description}}"></textarea>
        @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    
    <div class="form-group">

        
        <label class="my-3">In Stock</label>
        <input type="text" name="in_stock" class="form-control" value="{{$product->in_stock}}" >
        @error('in_stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>


    <div class="form-group mb-4">

        
        <label class="my-3">Price</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
        @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

<button type="submit" class="btn btn-success">Update</button>

<a href="{{route('indexproducts')}}" class="btn btn-primary">Cancel</a>


</form>



<form action="{{route('deleteproduct', $product->id)}}" method="post" class="mt-3">
    @csrf
    @method('delete')

<button class="btn btn-danger" type="submit">Delete</button>

</form>


@endsection