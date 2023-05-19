@extends('app')
@section('title')
Create Blog Page
@endsection


@section('content')
<div class="d-flex align-content-center justify-content-between ">

    <h1 class="my-5">Add New Blog</h1>
    {{-- <p>Click Here-><a href="{{route('indexproducts')}}" >Go Back!</a></p> --}}
</div>


<form action="{{route('storeblog')}}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="form-group">

        <label class="my-3">Title</label>
        <input type="text" name="title" class="form-control" required>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>


    <div class="form-group">

        
        <label class="my-3">Written By</label>
        <input type="text" name="written_by" class="form-control" required >
        @error('written_by')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>



    <div class="form-group">

        
        <label class="my-3">Image</label>
        <input type="file" name="image" class="form-control" required >
        @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>



    <div class="form-group mb-4">

        
        <label class="my-3">Description</label>
        <textarea name="description" cols="30" rows="8" class="form-control"  required></textarea>
        @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>


   

<button type="submit" class="btn btn-success">Add</button>

<a href="{{route('blogindex')}}" class="btn btn-primary">Cancel</a>

<input type="reset" value="Reset" class="btn btn-secondary">

</form>


@endsection