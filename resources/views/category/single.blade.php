@extends('app')

@section('title')
@foreach ($category as $category)
{{$category->name}}
@endforeach
@endsection

@section('content')

@foreach ($category->products  as $product )
    
<h1>
    <a href="{{route('detailproducts', $product->id)}}">
        {{$product->name}}
    </a>
</h1>
<img src="{{asset('images/' . $product->image)}}" alt="">
<p>{{$product->description}}</p>
<p>In Stock: {{$product->in_stock}}</p>
<p>Price: Rs.{{$product->price}}</p>
@endforeach



















@endsection