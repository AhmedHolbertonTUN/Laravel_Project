@extends('product.layout')

@section('content')

<div class="container" style="margin-top: 45px">
    <a href="{{ route('products.create')}}"><button type="button" class="btn btn-primary mb-5">Add New Product</button></a>
    <a href="{{ route('trash')}}"><button type="button" class="btn btn-primary mb-5">Trash</button></a>
    <div>
        @if ($message = Session::get('msg'))
        <div class="alert alert-success" role="alert">
          {{$message}}
          </div>
        @endif
    </div>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
@foreach ($products as $item)
<tr>
    <td> {{$item->name}} </td>
    <td>$ {{{$item->price}}} </td>
    <td>
        <div style="display: flex; justify-content: start">
            <a href="{{ route('products.show',$item->id)}}"><button type="button" class="btn btn-success mr-2">Show</button></a>
            <a href="{{ route('products.edit',$item->id)}}"><button type="button" class="btn btn-warning mr-2">Edit</button></a>
            <a href="{{ route('SoftDelete',$item->id)}}"><button type="button" class="btn btn-danger mr-2">Move to trash</button></a>
            {{-- <form action="{{ route('products.destroy',$item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> --}}
        </div>
    </td>
  </tr>
@endforeach
        </tbody>
      </table>
      <div>{!! $products->links() !!}</div>
</div>



@endsection
