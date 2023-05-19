@extends('app')
@section('title')
Add Product
@endsection


@section('content')

<h1 class="my-5">Edit C</h1>


<form  action="{{route('updatecategory', $category->id)}}" method="POST" >
    @method('PUT')
    @csrf





<div class="form-group my-3">

    <label class="my-3">Name</label>
    <input type="text" name="name" class="form-control" value="{{$category->name}}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

</div>


<button type="submit" class="btn btn-success">Update</button>

<a href="{{route('categoryindex')}}" class="btn btn-primary">Cancel</a>


</form>



<form action="{{route('deletecategory', $category->id)}}" method="post" class="mt-3">
    @csrf
    @method('delete')

<button class="btn btn-danger" type="submit">Delete</button>

</form>


@endsection