@extends('app')
@section('title')
    Homepage
@endsection
@section('content')
    <div class="d-flex justify-content-between align-items-center">

        <h1 class="my-4">Welcome</h1>
        <a href="#newsletter" style="text-decoration: none" class="border rounded-3 border-gray p-2">Subscribe</a>
    </div>
    <a href="{{ route('clientindex') }}" class="btn btn-primary my-3">Start Shopping</a>



    @php
        $images = ['https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1115&q=80', 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80', 'https://images.unsplash.com/photo-1522199755839-a2bacb67c546?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1472&q=80'];
    @endphp



    @include('carousel')

    <br>
    <br>
    <br>

    <h2>Latest Blogs </h2>

    @include('blogs')
    <br>
    <br>
    <br>
    <br>
    <div class="d-flex justify-content-between mb-5">

        <h2>Our Products</h2>
        <div class="search">
            @include('added_components.searchbtn')
        </div>

        <div class="blocks" style="position: relative;  z-index: 1;">

            <p><strong> Categories</strong></p>


            @foreach ($category as $category)
                <td>
                    <a href="{{ route('singlecategory', $category->id) }}" class="btn btn-outline-primary my-2">
                        {{ $category->name }}
                    </a>
                </td>
            @endforeach


            {{-- <div class="dropdown " x-data="{show:false}" >
            <a class="btn btn-primary dropdown-toggle" href="{{route('homepage')}}" role="button" data-bs-toggle="dropdown"
                aria-expanded="false" @click="show = !show" @click.away="show = false">
                Categories
            </a>

            <ul class="dropdown bg-gray-500 " x-show=show >
              @foreach ($category as $category)

              <li style="text-decoration:none;" class="dropdown-item ">
                
                <a href="{{ route('singlecategory', $category->id) }}" style=" text-decoration:none;">
                  {{ $category->name }}
                </a>
              </li>
              @endforeach
            </ul>
        </div> --}}



        </div>
    </div>

    @include('products')


    <div class="newsletter">
        @include('added_components.apiform')
    </div>
@endsection
