{{-- <form action="{{route('comments.store',$product->name, $product->id)}}" method="post" class="mt-5"> --}}

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