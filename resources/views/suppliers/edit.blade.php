@extends('layouts.app')
@section('title','Edit Supplier | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Edit supplier</h1>
<form method="POST" action="{{ route('admin.suppliers.update',$supplier) }}">@csrf @method('PUT')@include('suppliers.form',['item'=>$supplier])</form>
@endsection
