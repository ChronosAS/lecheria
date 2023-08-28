<div class="modal fade" tabindex="-1" role="dialog" {{ $attributes }} wire:ignore.self>
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
