@extends('app')
@section('title')
Add Product
@endsection


@section('content')
<div class="d-flex align-content-center justify-content-between ">

    <h1 class="my-5">Add New Product</h1>
    <p>Click Here-><a href="{{route('indexproducts')}}" >Go Back!</a></p>
</div>


<form action="{{route('storeproducts')}}" method="POST" enctype="multipart/form-data">
    @csrf


<div class="form-group">

    <label class="my-3">Name</label>
    <input type="text" name="name" class="form-control" required>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>





<div class="form-group">
    <label class="my-3">Category</label>
    
    <select class="form-select" aria-label="Default select example" name="category_id">
    @foreach ($categories as $category)
        <option value="{{$category->id}}" >{{$category->name}}</option>
    @endforeach

</select>
</div>





    <div class="form-group">

        
        <label class="my-3">Image</label>
        <input type="file" name="image" class="form-control" required >
        @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    
    <div class="form-group">

        
        <label class="my-3">Description</label>
        <textarea name="description" cols="30" rows="8" class="form-control"  required></textarea>
        @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>


 
    
    <div class="form-group">

        
        <label class="my-3">In Stock</label>
        <input type="number" name="in_stock" class="form-control" required >
        @error('in_stock')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>


    <div class="form-group mb-3">

        
        <label class="my-3">Price</label>
        <input type="number" name="price" class="form-control" required >
        @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

<button type="submit" class="btn btn-success">Add</button>

<a href="{{route('indexproducts')}}" class="btn btn-primary">Cancel</a>

<input type="reset" value="Reset" class="btn btn-secondary">

</form>


@endsection