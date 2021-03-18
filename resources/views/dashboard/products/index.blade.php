@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-end mb-2 mr-2">
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i class="fas fa-plus    "></i> Add</a>
</div>
<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Image</th>
            @foreach ($langs as $lang)
            <th>Title {{ $lang }}</th>
            @endforeach
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td><img src="{{ asset($product->image_src) }}" alt="" width="150" height="150"></td>
            @foreach ($langs as $lang)
            <td>{{ $product->title[$lang] }}</td>
            @endforeach
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name['en'] }}</td>
            <td>
                <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-success d-block"><i
                        class="fas fa-edit" aria-hidden="true"></i>Edit</a>
                <a href="{{ route('admin.attribute.index',$product->id) }}" class="btn btn-primary d-block"><i
                        class="fas fa-building" aria-hidden="true"></i>Attributes</a>
                <a href="{{ route('admin.image.index',$product->id) }}" class="btn btn-info d-block"><i
                        class="fas fa-images" aria-hidden="true"></i>images</a>
                <a href="#" class="btn btn-danger d-block"
                    onclick="event.preventDefault();deleteRecord({{ $product->id }})"><i class="fas fa-trash"></i>
                    Delete</a>
                <form id="delete-form-{{ $product->id }}" action="{{ route('admin.product.destroy',$product->id) }}"
                    method="POST" class="d-none">
                    @csrf
                    @method("delete")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row justify-content-center">
    {{ $products->links() }}
</div>
@endsection
@push('scripts')
@include('partials.delete-script')
@endpush
