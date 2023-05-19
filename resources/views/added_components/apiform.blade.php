<form action="/newsletter" method="POST" class=" p-4 border border-gray rounded-3 my-4 w-50 mx-auto bg-secondary" id="newsletter">
    @csrf
    
    
    
    <label class=" d-block  text-center text-white">Email</label>
    <div class="form-group p-4 w-75 mx-auto d-flex">

        <input type="text" name="email" class="form-control"   required>
        

        <button type="submit" class="btn btn-primary w-50">Subscribe</button>

    </div>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    
</form>




