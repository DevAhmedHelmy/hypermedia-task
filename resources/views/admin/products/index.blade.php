@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">category</th>
      <th scope="col">created at</th>
    </tr>
  </thead>
  <tbody>

    @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->category->name}}</td>
      <td>{{$product->created_at}}</td>
    </tr>

        @endforeach
  </tbody>
</table>
{!! $products->links('vendor.pagination.bootstrap-4') !!}
    </div>
</div>

@endsection
