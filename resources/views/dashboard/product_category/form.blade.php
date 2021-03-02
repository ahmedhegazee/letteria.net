{{-- {{ dd($errors) }} --}}
<div class="row">
    @foreach ($langs as $lang)
    <div class="form-group col-md-6">
        <label for="name">Name {{ $lang }}</label>
        <input type="text" class="form-control @error('name.'.$lang) is-invalid @enderror " id="name"
            placeholder="Enter name" value="{{ $category->name[$lang]??old('name.'.$lang) }}" name="name[{{ $lang }}]">
        @error('name.'.$lang)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @endforeach


    @foreach ($langs as $lang)
    <div class="form-group col-md-6">
        <label for="content">Content {{ $lang }}</label>
        <textarea class="form-control @error('content.'.$lang) is-invalid @enderror" id="content"
            placeholder="Enter content" rows="10"
            name="content[{{$lang  }}]">{{ $category->content[$lang]??old('content.'.$lang) }}</textarea>
        @error('content.'.$lang)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @endforeach
</div>
