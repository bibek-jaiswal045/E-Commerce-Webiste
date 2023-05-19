@extends('app')
@section('title')
Ordered List
@endsection

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between">
        <h1>Ordered Lists</h1>
        <p>Go Back: <a href="{{route('indexproducts')}}">Click Here!</a></p>

    </div>
    
    
    <table class="table table-bordered text-center mt-5">
        <tr>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Last Ordered Date</th>
            <th>Quantity</th>
        </tr>
      

@foreach ($users as $index=>$user)
@if (!$user->carts->sum('quantity') == 0)
    
<tr>
    @php
          $last_updated = $user->carts->last()->created_at;
    @endphp
    
    <td>{{++$index}}</td>
    <td>
        <a href="{{route('orderdetails', $user->id)}}">

        {{$user->name}}
        </a>
    </td>
    <td>{{$last_updated->format('F j, Y g:i a')}}</td>
    <td>{{$user->carts->sum('quantity')}}</td>
</tr>
@endif
    
@endforeach



    </table>


</div>