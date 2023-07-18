@if (session('success'))
<div class="alert alert-success bg-success text-white" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close">
    </button>
    <strong>Well done!</strong> {{ session('success') }}
</div>
@endif
@if (session('error'))
    <div class="alert alert-danger bg-danger text-white mb-0" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close">
        </button>
        <strong>Oh snap!</strong> {{session('error')}}
    </div>
@endif
