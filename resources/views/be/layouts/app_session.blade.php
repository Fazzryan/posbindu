@if ($errors->any())
    <div class="alert alert-danger alert-dismissible border-0 fade show" role="alert">
        @foreach ($errors->all() as $error)
            <span class="fw-bold d-block mt-1">
                <div class="d-flex align-items-center">
                    <iconify-icon icon="solar:info-circle-linear" width="1.2em" height="1.2em"></iconify-icon>
                    <span class="ms-1">{{ $error }}</span>
                </div>
            </span>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(\Session::has('success'))
    <div class="alert alert-success fw-bold alert-dismissible border-0 fade show" role="alert">
        <div class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                    <path stroke-linejoin="round" d="m8.5 12.5l2 2l5-5" />
                    <path
                        d="M22 12c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464c.974.974 1.3 2.343 1.41 4.536" />
                </g>
            </svg>
            {!! \Session::get('success') !!}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(\Session::has('failed'))
    <div class="alert alert-danger fw-bold alert-dismissible border-0 fade show" role="alert">
        {!! \Session::get('failed') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
