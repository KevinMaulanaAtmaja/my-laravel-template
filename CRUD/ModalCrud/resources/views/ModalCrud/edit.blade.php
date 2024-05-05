<div class="modal fade" id="modalEdit{{ $modalCrud->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Update Data ModalCrud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('modalcrud.update', $modalCrud->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="text_input">Text Input</label>
                        <input type="text" class="form-control" id="text_input" name="text_input"
                            value="{{ $modalCrud->text_input }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="number_input">Number Input</label>
                        <input type="number" class="form-control" id="number_input" name="number_input"
                            value="{{ $modalCrud->number_input }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="file_input">File Input</label>
                        <input type="file" class="form-control" id="file_input" name="file_input">
                        <p class="text-muted">Upload ulang jika ingin mengganti file.</p>
                        @if (filter_var($modalCrud->file_input, FILTER_VALIDATE_URL))
                        <img src="{{ $modalCrud->file_input }}" class="img-thumbnail mb-3 w-25 d-block">
                        @else
                        <img src="{{ asset('storage/images/' . $modalCrud->file_input) }}"
                            class="img-thumbnail mb-3 w-25 d-block">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="dropdown_input">Dropdown Input</label>
                        <select class="form-select" id="dropdown_input" name="dropdown_input">
                            <option value="" disabled>Choose Option</option>
                            <option value="option1" {{ $modalCrud->dropdown_input == 'option1' ? 'selected' : '' }}>
                                Option 1</option>
                            <option value="option2" {{ $modalCrud->dropdown_input == 'option2' ? 'selected' : '' }}>
                                Option 2</option>
                            <option value="option3" {{ $modalCrud->dropdown_input == 'option3' ? 'selected' : '' }}>
                                Option 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_input">Date Input</label>
                        <input type="date" class="form-control" id="date_input" name="date_input"
                            value="{{ $modalCrud->date_input }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="color_input">Color Input</label>
                        <input type="color" class="form-control form-control-color " id="color_input" name="color_input"
                            value="{{ $modalCrud->color_input }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="radio_input">Radio Input</label><br>
                        <label><input class="form-check-input" type="radio" name="radio_input" value="yes"
                                {{ $modalCrud->radio_input == 'yes' ? 'checked' : '' }}> Yes</label>
                        <label><input class="form-check-input" type="radio" name="radio_input" value="no"
                                {{ $modalCrud->radio_input == 'no'  ? 'checked' : '' }}> No</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hidden_input">Hidden Input</label>
                        <input type="hidden" class="form-control" id="hidden_input" name="hidden_input"
                            value="{{ $modalCrud->hidden_input }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>