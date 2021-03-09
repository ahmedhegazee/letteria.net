@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-end mb-2 mr-2">
    <a href="{{ route('admin.attribute.create') }}" class="btn btn-primary"><i class="fas fa-plus    "></i> Add</a>
</div>
<table class="table table-hover text-nowrap">
    <thead>
        <tr>

            @foreach ($langs as $lang)
            <th>Name {{ $lang }}</th>
            @endforeach
            <th>Preview</th>
            <th>Price</th>
            <th>Limit Chars</th>
            <th>Required</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($attributes as $attribute)
        <tr>
            @foreach ($langs as $lang)
            <td>{{ $attribute->name[$lang] }}</td>
            @endforeach
            <td>
                @if ($attribute->type=='text')
                <input type="text" {{$attribute->limit_chars!=0?"max='$attribute->limit_chars'":''  }}>
                @elseif($attribute->type=='dropdown')
                <div class="row">
                    @foreach ($langs as $lang)
                    <div class="col-6">
                        <h5>{{ $lang }}</h5>
                        <select>
                            <option disabled selected>Select</option>
                            @foreach ($attribute->values as $item)
                            <option>{{ $item->value[$lang] }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endforeach
                </div>
                @elseif($attribute->type=='radio')
                <div class="row">
                    @foreach ($langs as $lang)
                    <div class="col-6">
                        <h5>{{ $lang }}</h5>
                        @foreach ($attribute->values as $item)
                        <input type="radio" />{{ $item->value[$lang] }}
                        @endforeach
                    </div>
                    @endforeach
                </div>
                @endif
            </td>
            <td>{{ $attribute->price }}</td>
            <td>{{ $attribute->limit_chars==0?'No Limit':$attribute->limit_chars.' Characters' }}</td>
            <td>{{ $attribute->required==0?'Not Required':'Required' }}</td>
            <td>
                <a href="{{ route('admin.attribute.edit',$attribute->id) }}" class="btn btn-success"><i
                        class="fas fa-edit" aria-hidden="true"></i>Edit</a>
                <a href="#" class="btn btn-danger"
                    onclick="event.preventDefault();deleteRecord({{ $attribute->id }})"><i class="fas fa-trash"></i>
                    Delete</a>
                <form id="delete-form-{{ $attribute->id }}"
                    action="{{ route('admin.attribute.destroy',$attribute->id) }}" method="POST" class="d-none">
                    @csrf
                    @method("delete")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row justify-content-center">
    {{ $attributes->links() }}
</div>
@endsection
@push('scripts')
@include('partials.delete-script')
@endpush
