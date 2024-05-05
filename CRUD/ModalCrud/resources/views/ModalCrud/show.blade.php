<div class="modal fade" id="modalShow{{ $modalCrud->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data ModalCrud</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-3">Text Input:</dt>
                    <dd class="col-sm-9">{{ $modalCrud->text_input }}</dd>

                    <dt class="col-sm-3">Number Input:</dt>
                    <dd class="col-sm-9">{{ $modalCrud->number_input }}</dd>

                    <dt class="col-sm-3">File Input:</dt>
                    <dd class="col-sm-9">
                        @if (filter_var($modalCrud->file_input, FILTER_VALIDATE_URL))
                        <img src="{{ $modalCrud->file_input }}" class="img-thumbnail" width="200">
                        @else
                        <img src="{{ asset('storage/images/' . $modalCrud->file_input) }}" class="img-thumbnail"
                            width="200">
                        @endif
                    </dd>

                    <dt class="col-sm-3">Dropdown Input:</dt>
                    <dd class="col-sm-9">{{ $modalCrud->dropdown_input }}</dd>

                    <dt class="col-sm-3">Date Input:</dt>
                    <dd class="col-sm-9">{{ $modalCrud->date_input }}</dd>

                    <dt class="col-sm-3">Color Input:</dt>
                    <dd class="col-sm-9">
                        <div style="width: 50px; height: 50px; background-color: {{ $modalCrud->color_input }}"></div>
                    </dd>

                    <dt class="col-sm-3">Radio Input:</dt>
                    <dd class="col-sm-9">{{ $modalCrud->radio_input }}</dd>

                    <dt class="col-sm-3">Hidden Input:</dt>
                    <dd class="col-sm-9">{{ $modalCrud->hidden_input }}</dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
