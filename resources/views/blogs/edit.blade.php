@extends('app')
@section('title')
Edit Blog
@endsection


@section('content')

<h1 class="my-5">Edit Blog</h1>


<form class="mb-5" action="{{route('updateblog', $blog->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf


<div class="form-group">

    <label class="my-3">Title</label>
    <input type="text" name="title" class="form-control" value="{{$blog->title}}">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

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
        <textarea name="description" cols="30" rows="8" class="form-control"  value="{{$blog->description}}"></textarea>
        @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    
   


    <div class="form-group">

        
        <label class="my-3">Written By</label>
        <input type="text" name="written_by" class="form-control mb-5" value="{{$blog->written_by}}" >
        @error('written_by')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>

<button type="submit" class="btn btn-success">Update</button>

<a href="{{route('blogindex')}}" class="btn btn-primary">Cancel</a>


</form>



<form action="{{route('deleteblog', $blog->id)}}" method="post">
    @csrf
    @method('delete')

<button class="btn btn-danger" type="submit">Delete</button>

</form>


@endsection