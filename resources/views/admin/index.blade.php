@extends('layouts.admin')
@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Panel</h1>
    </div>
    <div class="row">
        <p>All news like {{$countNews}}</p><br>&nbsp;&nbsp;
        <p>All categories like {{$countCategories}}</p>
    </div>
@endsection
