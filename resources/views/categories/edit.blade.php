@extends('layouts.app')
@section('title','Edit Category | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Edit category</h1>
<form method="POST" action="{{ route('admin.categories.update',$category) }}">@csrf @method('PUT')@include('categories.form',['item'=>$category])</form>
@endsection
