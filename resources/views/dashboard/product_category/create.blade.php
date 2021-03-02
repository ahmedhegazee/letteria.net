@extends('layouts.dashboard')

@section('content')
<form action="{{ route('admin.category.store') }}" method="POST">
    @csrf
    @include("dashboard.product_category.form")
    <div class="row justify-content-end mr-2"><button class="btn btn-primary" type="submit">Add</button></div>
</form>
@endsection
