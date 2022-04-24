@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">created at</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>

                    <td>{{$category->created_at}}</td>
                    <td>
                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy',$category->id) }}" method="post">



                            <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-sm btn-clean
                                btn-icon mr-2" title="@lang('general.edit')">
                                <i class="fa fa-edit"></i>
                            </a>
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-sm btn-clean btn-icon" title="@lang('general.delete')" onclick="confirmDelete
                                ('delete-form-{{ $category->id }}')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $categories->links('vendor.pagination.bootstrap-4') !!}
    </div>
</div>

@endsection
