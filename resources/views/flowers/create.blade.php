@extends('layouts.app')
@section('title','Add Flower | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Add a flower</h1>
<form method="POST" action="{{ route('admin.flowers.store') }}">@csrf <div class="card p-4">@include('flowers.form')</div></form>
@endsection
