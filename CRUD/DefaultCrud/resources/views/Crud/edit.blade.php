@extends('layouts.main')

@section('konten')
<div class="d-flex justify-content-center align-items-center flex-column">
    <h1>Edit Data CRUD</h1>

    <form action="{{ route('crud.update', $crud->id) }}" method="POST" class="col-md-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <input type="text" class="form-control" id="text" name="text" value="{{ old('text', $crud->text) }}">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="number" class="form-control" id="number" name="number" value="{{ old('number', $crud->number) }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="checkbox">Checkbox</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox1" name="checkbox" value="checkbox1" @if(old('checkbox', $crud->checkbox) == 'checkbox1') checked @endif>
                <label class="form-check-label" for="checkbox1">Option 1</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox2" name="checkbox" value="checkbox2" @if(old('checkbox', $crud->checkbox) == 'checkbox2') checked @endif>
                <label class="form-check-label" for="checkbox2">Option 2</label>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="radio" class="form-label">Radio</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="radio_yes" value="yes" @if(old('radio', $crud->radio) == 'yes') checked @endif>
                <label class="form-check-label" for="radio_yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="radio_no" value="no" @if(old('radio', $crud->radio) == 'no') checked @endif>
                <label class="form-check-label" for="radio_no">No</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="select" class="form-label">Select</label>
            <select class="form-select" id="select" name="select">
                <option value="" disabled>Select Option</option>
                <option value="option1" @if(old('select', $crud->select) == 'option1') selected @endif>Option 1</option>
                <option value="option2" @if(old('select', $crud->select) == 'option2') selected @endif>Option 2</option>
                <option value="option3" @if(old('select', $crud->select) == 'option3') selected @endif>Option 3</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $crud->date) }}">
        </div>
        <div class="mb-3">
            <label for="range" class="form-label">Range: <span id="range_value">{{ old('range', $crud->range) }}</span></label>
            <input type="range" class="form-range" id="range" step="0.5" name="range" min="1" max="10" value="{{ old('range', $crud->range) }}">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" class="form-control" id="file" name="file">
            <p class="text-muted">Upload ulang jika ingin mengganti file.</p>
            @if (filter_var($crud->file, FILTER_VALIDATE_URL))
                <img src="{{ $crud->file }}" class="img-thumbnail mb-3 w-25 d-block">
            @else
                <img src="{{ asset('storage/images/' . $crud->file) }}" class="img-thumbnail mb-3 w-25 d-block">
            @endif
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="{{ old('color', $crud->color) }}">
        </div>
        <div class="mb-3">
            <label for="hidden" class="form-label">Hidden</label>
            <input type="hidden" class="form-control" id="hidden" name="hidden" value="{{ $crud->hidden }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
        <a href="{{ route('crud.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
@section('script')
<script>
    var input = document.getElementById('range');
    var output = document.getElementById('range_value');

    input.addEventListener('input', function() {
        output.textContent = input.value;
    });
</script>
@endsection