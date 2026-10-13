@extends('layouts.app')
@section('title','Edit Flower | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Edit flower</h1>
<form method="POST" action="{{ route('admin.flowers.update',$flower) }}">@csrf @method('PUT')<div class="card p-4">@include('flowers.form')</div></form>
@endsection
