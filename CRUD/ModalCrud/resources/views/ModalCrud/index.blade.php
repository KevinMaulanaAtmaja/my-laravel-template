@extends('layouts.main')
@section('konten')
<h2>Data ModalCrud</h2>
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">Create Data
    +</button>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Text Input</th>
                <th>Number Input</th>
                <th>File Input</th>
                <th>Dropdown Input</th>
                <th>Date Input</th>
                <th>Color Input</th>
                <th>Radio Input</th>
                <th>Hidden Input</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modalCruds as $modalCrud)
            <tr>
                <td>{{ ($modalCruds->currentPage() - 1) * $modalCruds->perPage() + $loop->index + 1 }}</td>
                <td>{{ $modalCrud->text_input }}</td>
                <td>{{ $modalCrud->number_input }}</td>
                <td>
                    @if (filter_var($modalCrud->file_input, FILTER_VALIDATE_URL))
                    <img src="{{ $modalCrud->file_input }}" width="100">
                    @else
                    <img src="{{ asset('storage/images/' . $modalCrud->file_input) }}" width="100">
                    @endif
                </td>
                <td>{{ $modalCrud->dropdown_input }}</td>
                <td>{{ $modalCrud->date_input }}</td>
                <td>
                    <div style="width: 50px; height: 50px; background-color: {{ $modalCrud->color_input }}"></div>
                </td>
                <td>{{ $modalCrud->radio_input }}</td>
                <td>{{ $modalCrud->hidden_input }}</td>
                <td width="200">
                    <button type="button" class="btn btn-sm me-1 btn-warning" data-bs-toggle="modal"
                        data-bs-target="#modalEdit{{ $modalCrud->id }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-sm me-1 btn-info" data-bs-toggle="modal"
                        data-bs-target="#modalShow{{ $modalCrud->id }}" data-id="{{ $modalCrud->id }}">
                        Show
                    </button>
                    <button type="button" class="btn btn-sm me-1 btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalDelete{{ $modalCrud->id }}" data-id="{{ $modalCrud->id }}">
                        Delete
                    </button>

                    @include('ModalCrud.edit')
                    @include('ModalCrud.show')
                    @include('ModalCrud.delete')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $modalCruds->links() }}
</div>
@include('ModalCrud.create')
@endsection
