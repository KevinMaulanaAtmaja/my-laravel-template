@extends('layouts.main')

@section('konten')
<div class="d-flex justify-content-center align-items-center flex-column">
    <h1>Tambah Data CRUD</h1>

    <form action="{{ route('crud.store') }}" method="POST" class="col-md-6" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <input type="text" class="form-control" id="text" name="text" value="{{ old('text') }}">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="number" class="form-control" id="number" name="number" value="{{ old('number') }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="checkbox">Checkbox</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox1" name="checkbox" value="checkbox1" {{ old('checkbox') == 'checkbox1' ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox1">Checkbox 1</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox2" name="checkbox" value="checkbox2" {{ old('checkbox') == 'checkbox2' ? 'checked' : '' }}>
                <label class="form-check-label" for="checkbox2">Checkbox 2</label>
            </div>
        </div>
        
        <div class="mb-3">
            <label for="radio" class="form-label">Radio</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="radio_yes" value="yes" {{ old('radio') == 'yes' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio_yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="radio" id="radio_no" value="no" {{ old('radio') == 'no' ? 'checked' : '' }}>
                <label class="form-check-label" for="radio_no">No</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="select" class="form-label">Select</label>
            <select class="form-select" id="select" name="select">
                <option value="" selected disabled>Select Option</option>
                <option value="option1" {{ old('select') == 'option1' ? 'selected' : '' }}>Option 1</option>
                <option value="option2" {{ old('select') == 'option2' ? 'selected' : '' }}>Option 2</option>
                <option value="option3" {{ old('select') == 'option3' ? 'selected' : '' }}>Option 3</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
        </div>
        <div class="mb-3">
            <label for="range" class="form-label">Range: <span id="range_value">{{ old('range') }}</span></label>
            <input type="range" class="form-range" id="range" step="0.5" name="range" min="1" max="10" value="{{ old('range') }}">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="{{ old('color') }}">
        </div>
        <div class="mb-3">
            <label for="hidden" class="form-label">Hidden</label>
            <input type="hidden" class="form-control" id="hidden" name="hidden" value="hidden_value">
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
