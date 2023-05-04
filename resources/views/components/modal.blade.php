<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-inline text-center">
                <div class="modal-title">
                    <div class="btn-close" data-bs-dismiss="modal"></div>
                    <h1>
                        {{ $title }}
                    </h1>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push("styles")
<style>
    .close-modal {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    width: 3rem;
    height: 3rem;
    cursor: pointer;
    background-color: transparent;
    }
</style>
@endpush
