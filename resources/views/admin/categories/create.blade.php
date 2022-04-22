@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
    <form method="post" action="{{url('admin/categories')}}">
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



  <div>
      <button type="submit" class="btn btn-success">Save</button>
  </div>
</form>
    </div>
</div>

@endsection
