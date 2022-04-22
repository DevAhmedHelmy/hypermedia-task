@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
    <form method="post" action="{{url('admin/products')}}">
        @csrf
  <div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="product name">

    @error('name')
    <div class="invalid-feedback">
    {{ $message }}
        </div>
        @enderror
  </div>
  <div class="form-group">
    <label for="category_id">Categories</label>
    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
      <option value="" >Choose</option>
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>

        @endforeach
    </select>
    @error('category_id')
    <div class="invalid-feedback">
    {{ $message }}
        </div>
        @enderror
  </div>

  <div class="form-group">
    <label for="description">description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
    @error('description')
    <div class="invalid-feedback">
    {{ $message }}
        </div>
        @enderror
  </div>


  <div>
      <button type="submit" class="btn btn-success">Save</button>
  </div>
</form>
    </div>
</div>

@endsection
