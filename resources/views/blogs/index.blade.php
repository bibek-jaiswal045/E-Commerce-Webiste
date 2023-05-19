@extends('app')
@section('title')
Blog Page
@endsection

@section('content')
<div class="d-flex justify-content-between my-5">

<h1>This is the blog page.</h1>
    
<a href="{{route('createblog')}}" class="btn btn-primary">Add Blog</a>

</div>
@foreach ($blogs as $blog)
<div class="d-flex justify-content-between">

    <h2>{{$blog->title}}</h2>
    <a href="{{route('editblog', $blog->id)}}" class="btn btn-primary">Edit</a>
</div>
<p>Written By: <span class="text-primary">{{$blog->written_by}}</span> and created on: <span class="text-primary">{!! htmlspecialchars_decode(date(' F j, Y', strtotime($blog->created_at))) !!}</span> </p>
    @if ($blog->image)
    <div class="image">

        <img  src="{{ asset('blogimages/' . $blog->image) }}" alt="" style="width: 300px; height:300px;">
    </div>
        
    @endif

<p class="mt-3">{{$blog->description}}</p>
@endforeach


@endsection