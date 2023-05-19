



<div class="d-flex justify-content-between flex-wrap" >

      @foreach ($products as $product)

    <div class="card m-3 w-50" style="max-width: 540px;">
        <div class="row g-0 ">
            <div class="col-md-4">

                <img src="{{ asset('images/' . $product->image) }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                <h5 class="card-title">
                    <a href="{{route('detailproducts', $product->id)}}">
                        {{$product->name}}
                    </a>
                </h5>
                <p class="card-text">{{$product->description}}</p>
                <p class="card-text">Category: {{$product->category->name}}</p>
                
                <p class="card-text">In Stock: <small class="text-muted">{{$product->in_stock}}</small></p>
                <p class="card-text">Price: <small class="text-muted">{{$product->price}}</small></p>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myProduct-{{$product->id}}">
                    Show Modal
                </button>
                @include('added_components.productmodal') --}}
                </div>
            </div>
        </div>
    </div>
      @endforeach
      
    </div>
    <div class="links">

        {{$products->links('pagination::bootstrap-5')}}
    </div>
