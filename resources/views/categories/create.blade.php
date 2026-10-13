@extends('layouts.app')
@section('title','Add Category | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Add category</h1>
<form method="POST" action="{{ route('admin.categories.store') }}">@csrf @include('categories.form',['item'=>$category])</form>
@endsection
