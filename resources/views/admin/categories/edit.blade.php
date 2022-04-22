@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
    <form method="post" action="{{url('admin/categories/'.$category->id)}}">
        @csrf
        @method('patch')
  <div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Category name" value="{{$category->name}}">

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
