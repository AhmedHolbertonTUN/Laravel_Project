@extends('product.layout')

@section('content')


<div class="container mt-5">
<div class="card" style="width: 18rem;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Circle-icons-dolly.svg/1024px-Circle-icons-dolly.svg.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <p class="card-text">{{$product->detail}}</p>
      <h5 class="card-title">${{$product->price}}</h5>
      <a href="{{route('products.index')}}" class="btn btn-primary">Go Back</a>
    </div>
  </div>
</div>



@endsection
