{{-- {{ dd($errors) }} --}}
<div class="row">
    @foreach ($langs as $lang)
    <div class="form-group col-md-6">
        <label for="name">Name {{ $lang }}</label>
        <input type="text" class="form-control @error('name.'.$lang) is-invalid @enderror " id="name"
            placeholder="Enter name" value="{{ $attribute->name[$lang]??old('name.'.$lang) }}" name="name[{{ $lang }}]">
        @error('name.'.$lang)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @endforeach
    <div class="col-md-6">
        <!-- select -->
        <div class="form-group">
            <label>Attribute Type</label>
            <select class="form-control @error('type') is-invalid @enderror" name="type" id="type"
                onchange="showValuesSection()">
                <option value="dropdown" {{($attribute->type??old('type'))=='dropdown'?'selected':'' }}>
                    Dropdown Menu</option>
                <option value="text" {{ ($attribute->type??old('type'))=='text'?'selected':'' }}>Text</option>
                <option value="radio" {{ ($attribute->type??old('type'))=='radio'?'selected':'' }}>Choices
                </option>
            </select>
            @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6 {{ ($attribute->type??old('type'))=='text'?'':'d-none' }}" id="limit_chars">
        <!-- select -->
        <div class="form-group">
            <label for="limit_chars">Limit Chars</label>
            <input type="text" class="form-control @error('limit_chars') is-invalid @enderror " id="limit_chars"
                placeholder="Enter name" value="{{ $attribute->limit_chars??old('limit_chars') }}" min="0" max="100"
                name="limit_chars">
            @error('limit_chars')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <!-- select -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror " id="price"
                placeholder="Enter price" value="{{ $attribute->price??old('price') }}" name="price">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6 pt-4">
        <!-- radio -->
        <div class="form-group">
            <div class="form-check d-inline">
                <input class="form-check-input" type="radio" value="0" name="required" checked>
                <label class="form-check-label">Not Required</label>
            </div>
            <div class="form-check d-inline ml-2">
                <input class="form-check-input" type="radio" value="1" name="required">
                <label class="form-check-label">Required</label>
            </div>
            @error('required')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12 {{ ($attribute->type??old('type'))!='text'?'':'d-none' }}" id="values">
        @error('values')
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <h5>Values</h5>
        <button class="btn btn-primary" type="button" onclick="addNewValuesSection()">Add New</button>

        {{-- {{ dd(old('values')) }} --}}
        <div class="row" id="valuesSection">
            @if (!empty($attribute)||old('values'))
            @foreach ($attribute->values??old('values') as $item)
            <div class="form-group col-md-6"><label for="name">Value (en)</label>
                <input type="text"
                    class="form-control @error('values.'.($loop->iteration-1).'.en') is-invalid @enderror"
                    placeholder="Enter value" value="{{ $item->value['en']??$item['en'] }}"
                    name="values[{{ $loop->iteration-1 }}][en]" min="3" max="191">
                @error('values.'.($loop->iteration-1).'.en')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-6"><label for="name">Value (ar)</label>
                <input type="text"
                    class="form-control @error('values.'.($loop->iteration-1).'.ar') is-invalid @enderror"
                    placeholder="Enter value" value="{{ $item->value['ar']??$item['ar'] }}"
                    name="values[{{ $loop->iteration-1 }}][ar]" min="3" max="191">
                @error('values.'.($loop->iteration-1).'.ar')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>
@push('scripts')
<script>
    @if($attribute??false)
    let lastIndex={{ !is_null($attribute->values)?$attribute->values->count():0 }};
    @else
    let lastIndex={{ !empty(old('values'))?sizeof(old('values')):0 }};
    @endif
    document.onload=function(){
        showValuesSection();
    }
    function showValuesSection(){
        let attributeType = document.getElementById('type'),
            limitCharsInput = document.getElementById('limit_chars'),
            valuesSection = document.getElementById("values");
        hideAllSections();
        if(type.value=="text"){
            limitCharsInput.classList.remove("d-none");
        }else {
            valuesSection.classList.remove("d-none");
        }
    }
    function addNewValuesSection(){
        let valuesSection  = document.getElementById('valuesSection'),
        newSection=`<div class="form-group col-md-6"><label for="name">Value (en)</label>
        <input type="text" class="form-control"  placeholder="Enter value"
            value="" name="values[${lastIndex}][en]" min="3" max="191"></div>
            <div class="form-group col-md-6"><label for="name">Value (ar)</label>
                <input type="text" class="form-control" placeholder="Enter value" value="" name="values[${lastIndex}][ar]" min="3"
                    max="191"></div>`;
                lastIndex++;
        valuesSection.innerHTML=valuesSection.innerHTML+newSection;
    }
    function hideAllSections(){
        let limitCharsInput = document.getElementById('limit_chars'),
        valuesSection = document.getElementById("values");
        limitCharsInput.classList.add("d-none");
        valuesSection.classList.add("d-none");
    }
</script>
@endpush
