@extends('layouts.app')
@section('content')
<h1>Hello, {{Auth::user()->name}}</h1>
<br>
<p> <a href="{{route('admin.index')}}">Go to admin panel</a></p>
@endsection
