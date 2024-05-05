@extends('layouts.main')
@section('konten')
<h1>Detail Data CRUD</h1>

<div class="row">
    <div class="col-md-6">
        <p><strong>Text:</strong> {{ $crud->text }}</p>
        <p><strong>Number:</strong> {{ $crud->number }}</p>
        <p><strong>Checkbox:</strong> {{ $crud->checkbox }}</p>
        <p><strong>Radio:</strong> {{ $crud->radio }}</p>
        <p><strong>Select:</strong> {{ $crud->select }}</p>
        <p><strong>Date:</strong> {{ $crud->date }}</p>
        <p><strong>Range:</strong> {{ $crud->range }}</p>
        <p><strong>Nama File:</strong> {{ $crud->file }}</p>
        @if (filter_var($crud->file, FILTER_VALIDATE_URL))
            <img src="{{ $crud->file }}" width="100">
        @else
            <img src="{{ asset('storage/images/' . $crud->file) }}" width="100">
        @endif
        <p><strong>Color:</strong> {{ $crud->color }}</p>
        <p><strong>Hidden:</strong> {{ $crud->hidden }}</p>
    </div>
</div>

<a href="{{ route('crud.index') }}" class="btn btn-primary">Kembali</a>
@endsection