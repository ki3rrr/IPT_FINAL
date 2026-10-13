@extends('layouts.app')
@section('title','Create Order | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Create an order</h1>
<form method="POST" action="{{ route('admin.orders.store') }}">@csrf <div class="card p-4">@include('orders.form')</div></form>
@endsection
