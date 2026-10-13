@extends('layouts.app')
@section('title','Add Customer | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Add customer</h1>
<form method="POST" action="{{ route('admin.customers.store') }}">@csrf @include('customers.form',['item'=>$customer])</form>
@endsection
