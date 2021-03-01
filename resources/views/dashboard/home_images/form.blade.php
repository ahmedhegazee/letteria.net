<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" placeholder="Enter title"
        value="{{ $slider->title??old('title') }}" name="title">
    @error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="sub_title">Sub Title</label>
    <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="sub_title"
        placeholder="Enter subtitle" value="{{ $slider->sub_title??old('sub_title') }}" name="sub_title">
    @error('sub_title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="image">Image</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image"
                accept="image/*">
            <label class="custom-file-label" for="image">Choose Image</label>
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
