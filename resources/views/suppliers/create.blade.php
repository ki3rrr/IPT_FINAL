@extends('layouts.app')
@section('title','Add Supplier | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Add supplier</h1>
<form method="POST" action="{{ route('admin.suppliers.store') }}">@csrf @include('suppliers.form',['item'=>$supplier])</form>
@endsection
