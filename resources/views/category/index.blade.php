@extends('app')
@section('title')
All Categories
@endsection

@section('content')

<div class="d-flex justify-content-between">

    <h1>All Categories</h1>
    <a href="{{route('createcategory')}}" class="btn btn-primary">Add Category</a>
</div>

@foreach ($categories as $category)
<div class="d-flex justify-content-between my-4">

    <li>{{$category->name}}</li>
    <a href="{{route('editcategory', $category->id)}}" class="btn btn-secondary">Edit</a>

</div>

@endforeach
@endsection