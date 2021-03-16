@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-end mb-2 mr-2">
    <a href="{{ route('admin.image.create',$product->id) }}" class="btn btn-primary"><i class="fas fa-plus    "></i>
        Add</a>
</div>
<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($images as $image)
        <tr>
            <td><img src="{{ asset($image->src) }}" alt="" width="150" height="150"></td>
            <td>
                <a href="{{ route('admin.image.edit',['product'=>$product->id,'image'=>$image->id]) }}"
                    class="btn btn-success"><i class="fas fa-edit" aria-hidden="true"></i>Edit</a>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault();deleteRecord({{ $image->id }})"><i
                        class="fas fa-trash"></i> Delete</a>
                <form id="delete-form-{{ $image->id }}"
                    action="{{ route('admin.image.destroy',['product'=>$product->id,'image'=>$image->id]) }}"
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
    {{ $images->links() }}
</div>
@endsection
@push('scripts')
@include('partials.delete-script')
@endpush
