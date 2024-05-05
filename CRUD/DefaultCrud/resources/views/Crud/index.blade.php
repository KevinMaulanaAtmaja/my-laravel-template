@extends('layouts.main')
@section('konten')
<h1>Data CRUD</h1>
<a href="{{ route('crud.create') }}" class="btn btn-primary mb-3">Create Data +</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Text</th>
                <th>Number</th>
                <th>Checkbox</th>
                <th>Radio</th>
                <th>Select</th>
                <th>Date</th>
                <th>Range</th>
                <th>File</th>
                <th>Color</th>
                <th>Hidden</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cruds as $crud)
            <tr>
                <td>{{ ($cruds->currentPage() - 1) * $cruds->perPage() + $loop->index + 1 }}</td>
                <td>{{ $crud->text }}</td>
                <td>{{ $crud->number }}</td>
                <td>{{ $crud->checkbox }}</td>
                <td>{{ $crud->radio }}</td>
                <td>{{ $crud->select }}</td>
                <td>{{ $crud->date }}</td>
                <td>{{ $crud->range }}</td>
                <td>
                    {{-- @dd(filter_var($crud->file, FILTER_VALIDATE_URL)) --}}
                    @if (filter_var($crud->file, FILTER_VALIDATE_URL))
                    <img src="{{ $crud->file }}" width="100">
                    @else
                    <img src="{{ asset('storage/images/' . $crud->file) }}" width="100">
                    @endif
                </td>
                <td>
                    <div style="width: 50px; height: 50px; background-color: {{ $crud->color }};"></div>
                </td>
                <td>{{ $crud->hidden }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('crud.show', $crud->id) }}" class="btn btn-info btn-sm me-1">Show</a>
                        <a href="{{ route('crud.edit', $crud->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                        <form action="{{ route('crud.destroy', $crud->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('yakin?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $cruds->links() }}
@endsection
