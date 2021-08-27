@extends('layouts.admin')
@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit News</h1>
        <a href="{{route('admin.news.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i>Back</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            @include('inc.message')
            <form method="post" action="{{route('admin.news.update', ['news'=>$news])}}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category_id">Category</label>
<select class="form-control" name="category_id" id="category_id">
    <option value="0">Select category</option>
    @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->title}}</option>
    @endforeach
</select>
                </div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
        @error('title')
<div style="color:red; font-weight:bold">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
        @error('title')
        <div style="color:red; font-weight:bold">{{$message}}</div>
                @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" name="image" id="image" value="{{$news->image}}">
    </div>
    <div class="form-group">
        <label for="title">Status</label>
        <select class="form-control" name="status" id="status">
            <opt value="DRAFT" @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
            <option value="PUBLISED" @if($news->status === 'PUBLISED') selected @endif>PUBLISED</option>
            <option value="DELETED" @if($news->status === 'DELETED') selected @endif>DELETED</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" class="form-control" name="description" id="description">{{!!$news->description!!}}</textarea>
    </div>
    <button class="btn btn-primary">Save</button>
</form></div>


    </div>
@endsection
