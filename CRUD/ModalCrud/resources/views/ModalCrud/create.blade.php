<div class="modal fade" id="modalCreate" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateLabel">Create Data ModalCrud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('modalcrud.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="text_input">Text Input</label>
                        <input type="text" class="form-control" id="text_input" name="text_input"
                            value="{{ old( 'text_input' ) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="number_input">Number Input</label>
                        <input type="number" class="form-control" id="number_input" name="number_input"
                            value="{{ old( 'number_input' ) }}" min="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="file_input">File Input</label>
                        <input type="file" class="form-control" id="file_input" name="file_input">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="dropdown_input">Dropdown Input</label>
                        <select class="form-select" id="dropdown_input" name="dropdown_input">
                            <option value="" selected disabled>Choose Option</option>
                            <option value="option1" {{ old('dropdown_input') == 'option1' ? 'selected' : '' }}>Option 1
                            </option>
                            <option value="option2" {{ old('dropdown_input') == 'option2' ? 'selected' : '' }}>Option 2
                            </option>
                            <option value="option3" {{ old('dropdown_input') == 'option3' ? 'selected' : '' }}>Option 3
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="date_input">Date Input</label>
                        <input type="date" class="form-control" id="date_input" name="date_input"
                            value="{{ old( 'date_input' ) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="color_input">Color Input</label>
                        <input type="color" class="form-control form-control-color " id="color_input" name="color_input"
                            value="{{ old( 'color_input' ) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="radio_input">Radio Input</label><br>
                        <label><input class="form-check-input" type="radio" name="radio_input" value="yes"
                                {{ old('radio_input') == 'yes' ? 'checked' : '' }}> Yes</label>
                        <label><input class="form-check-input" type="radio" name="radio_input" value="no"
                                {{ old('radio_input') == 'no'  ? 'checked' : '' }}> No</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="hidden_input">Hidden Input</label>
                        <input type="hidden" class="form-control" id="hidden_input" name="hidden_input"
                            value="hidden_value">
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
