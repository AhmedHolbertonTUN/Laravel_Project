@extends('product.layout')

@section('content')

<div class="container" style="margin-top: 45px">
    <a href="{{ route('products.index')}}"><button type="button" class="btn btn-primary mb-5">Product list</button></a>
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
            <a href="{{ route('restore',$item->id)}}"><button type="button" class="btn btn-success mr-2">Restore</button></a>
            <a href="{{ route('remove',$item->id)}}"><button type="button" class="btn btn-danger mr-2">Delete</button></a>
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
