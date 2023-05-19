  <div class="modal fade" id="myModal-{{ $blog->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-block">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="staticBackdropLabel">{{$blog->title}}</h5>
                <p>Written By: {{$blog->written_by}} at <span>{!! htmlspecialchars_decode(date(' F j, Y', strtotime($blog->created_at))) !!}</span></p>
        </div>
        <div class="modal-body">
         {{$blog->description}}
         <img  src="{{ asset('blogimages/' . $blog->image) }}" alt="" style="width: 300px; height:300px;">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>