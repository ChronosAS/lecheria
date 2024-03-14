@if(session()->has('message'))
    <div class="alert {{ session('alert') ?? 'alert-info'}} alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding-top: .60rem"></button>
    </div>
@endif
