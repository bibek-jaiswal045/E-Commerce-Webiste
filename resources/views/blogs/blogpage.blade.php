@extends('app')
@section('title')
{{$blog->title}}
@endsection
@section('content')
            <div class="whole text-center">

                <h1>{{$blog->title}}</h1>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal-{{$blog->id}}">
                    Show Modal
                  </button>
                  @include('added_components.blogmodal')
                <p>
                    Written By: 
                    <span class="text-primary">{{$blog->written_by}}</span>
               Updated on: <span class="text-primary">{!! htmlspecialchars_decode(date(' F j, Y', strtotime($blog->created_at))) !!}</span>
            </p>

            
            
            <p>{{$blog->description}}</p>
            
          <img  src="{{ asset('blogimages/' . $blog->image) }}" alt="" style="width: 300px; height:300px;">

        </div>
       
        



@endsection


