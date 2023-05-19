@extends('app')
@section('title')
Create Blog Page
@endsection


@section('content')
<div class="d-flex align-content-center justify-content-between ">

    <h1 class="my-5">Add New Category</h1>
    {{-- <p>Click Here-><a href="{{route('indexproducts')}}" >Go Back!</a></p> --}}
</div>


<form action="{{route('storecategory')}}" method="POST" >
    @csrf


    <div class="form-group mb-4">

        <label class="my-3">Name</label>
        <input type="text" name="name" class="form-control" required>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>




<button type="submit" class="btn btn-success">Add</button>

<a href="{{route('blogindex')}}" class="btn btn-primary">Cancel</a>

<input type="reset" value="Reset" class="btn btn-secondary">

</form>


@endsection