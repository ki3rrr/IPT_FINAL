@extends('layouts.app')
@section('title','Edit Customer | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Edit customer</h1>
<form method="POST" action="{{ route('admin.customers.update',$customer) }}">@csrf @method('PUT')@include('customers.form',['item'=>$customer])</form>
@endsection
