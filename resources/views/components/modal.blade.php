<div class="portfolio-modal modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content pt-4">
            <div class="modal-header">
                <div class="modal-title p-4">
                    <h1>
                        {{ $title }}
                    </h1>
                </div>
                <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('img/close-icon.svg') }}" alt="Close modal" /></div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            {{ $slot }}
                        </div>
                        <div class="modal-footer d-inline">
                            {{ $footer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
