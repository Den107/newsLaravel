@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
    <a href="{{route('admin.categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i>Add Category</a>
</div>

<!-- Content Row -->
<div class="row">
    @include('inc.message')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Control</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="{{route('admin.categories.edit',
                            [
                                'category'=>$category->id
                                ])}}" style="font-size: 12px">Edit</a>&nbsp;
                            <a href="javascript:;" style="font-size: 12px; color: red">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Don`t have categories</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
</div>
@endsection
