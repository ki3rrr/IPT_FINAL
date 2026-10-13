@extends('layouts.app')
@section('title','Edit Order | Flowers Shop Management System')
@section('content')
<h1 class="page-title mb-3">Edit order #{{ $order->id }}</h1>
<form method="POST" action="{{ route('admin.orders.update',$order) }}">@csrf @method('PUT')<div class="card p-4">@include('orders.form')</div></form>
@endsection
