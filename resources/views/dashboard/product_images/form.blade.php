{{-- {{ dd($errors) }} --}}
<div class="row">
    <div class="form-group col-md-12">
        <label for="image"> Image(s)</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image"
                    accept="image/*"
                    {{ request()->is("dashboard/product/$product->id/image/create")?"multiple name=images[]":"name=image" }}>
                <label class="custom-file-label" for="image">Choose Image</label>
            </div>
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
