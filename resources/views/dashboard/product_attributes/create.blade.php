@extends('layouts.dashboard')

@section('content')
<form action="{{ route('admin.attribute.store',$product->id) }}" method="POST">
    @csrf
    @include("dashboard.product_attributes.form")
    <div class="row justify-content-end mr-2"><button class="btn btn-primary" type="submit">Add</button></div>
</form>
@endsection
