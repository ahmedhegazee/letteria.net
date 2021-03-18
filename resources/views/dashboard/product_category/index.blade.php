@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-end mb-2 mr-2">
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i class="fas fa-plus    "></i> Add</a>
</div>
<table class="table table-hover text-nowrap">
    <thead>
        <tr>

            @foreach ($langs as $lang)
            <th>Name {{ $lang }}</th>
            <th>Content {{ $lang }}</th>
            @endforeach

            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $categry)
        <tr>

            @foreach ($langs as $lang)
            <td>{{ $categry->name[$lang] }}</td>
            <td>
                <textarea name="" id="" cols="30" rows="10" disabled style="border: none;
background: transparent;
color: #000;">
                    {{ $categry->content[$lang] }}
                </textarea>
            </td>
            @endforeach
            <td>
                <a href="{{ route('admin.category.edit',$categry->id) }}" class="btn btn-success"><i class="fas fa-edit"
                        aria-hidden="true"></i>Edit</a>
                <a href="#" class="btn btn-danger" onclick="event.preventDefault();deleteRecord({{ $categry->id }})"><i
                        class="fas fa-trash"></i> Delete</a>
                <form id="delete-form-{{ $categry->id }}" action="{{ route('admin.category.destroy',$categry->id) }}"
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
    {{ $categories->links() }}
</div>
@endsection
@push('scripts')
@include('partials.delete-script')
@endpush
