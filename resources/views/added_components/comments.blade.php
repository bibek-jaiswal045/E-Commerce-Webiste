{{-- <form action="{{route('comments.store',$product->name, $product->id)}}" method="post" class="mt-5"> --}}

@auth

    <form action="{{ route('comments.store', $product->id) }}" method="post" class="mt-5">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }} ">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }} ">

        <h5>Wanna give any feedback?</h5>
        <textarea name="comment" rows="8" class="w-50 form-control" placeholder="Text Here!" required></textarea>
        @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-3">Post</button>
    </form>

@endauth

@foreach ($productcomment as $comment)
    @if ($comment->product_id == $product->id)
        <div class="box mt-4 p-4">
            <div class="d-flex">

                <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="" width="60px" height="60px"
                    class="rounded">
                <div class="content px-3 d-flex justify-content-between w-100">
                    <div class="contetsform">

                        <h5> <strong> {{ $comment->user->name }}</strong></h5>
                        <p>Posted {{ $comment->updated_at->diffForHumans() }}</p>
                        <p>{{ $comment->comment }}</p>

                    </div>

                    @auth
                        <div class="form ">

                            @if ($comment->user->name == auth()->user()->name)
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('delete')


                                    <button class="btn btn-danger" type="submit">Delete</button>


                                </form>
                            @endif
                        </div>
                    @endauth

                </div>




            </div>
        </div>
    @else
        <div class="box d-none"></div>
    @endif
@endforeach
