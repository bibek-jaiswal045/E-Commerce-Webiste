<div class="row">


    @foreach ($blogs as $blog)
        <div class="card w-33 m-3 p-0" style="width: 18rem;">
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal-{{$blog->id}}">
        Show Modal
      </button>
      @include('added_components.blogmodal') --}}
            <img src="{{ asset('blogimages/' . $blog->image) }}" alt="" class="card-img-top w-100">

            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($blog->title, 20) }}</h5>
                {{-- <p>Written By: <span class="text-primary">{{$blog->written_by}}</span> and created at: <span class="text-primary">{!! htmlspecialchars_decode(date(' F j, Y', strtotime($blog->created_at))) !!}</span> </p> --}}
                
                
                <p>Written By: <span class="text-primary">{{ $blog->written_by }}</span> and Created at: <span
                        class="text-primary">{{ $blog->created_at->diffForHumans() }}</span> </p>



                <p class="card-text">{{ Str::limit($blog->description, 30) }}</p>
                <a href="{{ route('detailblog', $blog->id) }}" style="text-decoration: none;">Read More</a>

            </div>

        </div>
    @endforeach
</div>
