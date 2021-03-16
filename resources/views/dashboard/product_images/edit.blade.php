@extends('layouts.dashboard')

@section('content')
<form action="{{ route('admin.image.update',['product'=>$product->id,'image'=>$image->id]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row justify-content-center">
        <img src="{{ asset($image->src) }}" width="200px" alt="">
    </div>
    @include("dashboard.product_images.form")
    <div class="row justify-content-end mr-2"><button class="btn btn-primary" type="submit">Edit</button></div>
</form>
@endsection
