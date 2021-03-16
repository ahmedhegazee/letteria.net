@extends('layouts.dashboard')

@section('content')
<form action="{{ route('admin.attribute.update',['attribute'=>$attribute->id,'product'=>$product->id]) }}"
    method="POST">
    @csrf
    @method('put')
    @include("dashboard.product_attributes.form")
    <div class="row justify-content-end mr-2"><button class="btn btn-primary" type="submit">Edit</button></div>
</form>
@endsection
