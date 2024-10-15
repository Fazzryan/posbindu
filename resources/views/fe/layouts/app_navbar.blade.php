@push('custom-css')
    <style>
        .navbar-nav .nav-link.active {
            color: blue;
        }
    </style>
@endpush

<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container py-2">
        <a class="navbar-brand fw-bolder" href="{{ route('fe.beranda') }}">POSBINDU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-lg-center ms-auto">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is('/') ? 'active' : '' }}"
                        href="{{ route('fe.beranda') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is('edukasi') ? 'active' : '' }}"
                        href="{{ route('fe.edukasi') }}">Edukasi</a>
                </li>
                @if (Session::has('login'))
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('fe.identitas.show') }}">Identitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('fe.riwayat.list') }}">Riwayat</a>
                    </li>
                @endif
                <li class="nav-item ms-0 ms-lg-2">
                    @if (Session::has('login'))
                        {{-- <a href="{{ route('auth.actLogout') }}" class="btn btn-dark">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path stroke-linejoin="round" d="M15 12H6m0 0l2 2m-2-2l2-2" />
                                        <path
                                            d="M12 21.983c-1.553-.047-2.48-.22-3.121-.862c-.769-.768-.865-1.946-.877-4.121M16 21.998c2.175-.012 3.353-.108 4.121-.877C21 20.243 21 18.828 21 16V8c0-2.828 0-4.243-.879-5.121C19.243 2 17.828 2 15 2h-1c-2.828 0-4.243 0-5.121.879c-.769.768-.865 1.946-.877 4.121M3 9.5v5c0 2.357 0 3.535.732 4.268S5.643 19.5 8 19.5M3.732 5.232C4.464 4.5 5.643 4.5 8 4.5" />
                                    </g>
                                </svg>
                                <span class="ms-1 fw-semibold">Logout</span>
                            </div>
                        </a> --}}
                        <div class="btn-group">
                            <button class="btn btn-dark fw-semibold dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                @php
                                    $session = session()->get('user_session')['nm_lengkap'];
                                    $limit = explode(' ', $session);
                                    if (count($limit) > 1) {
                                        $nama = $limit[0] . ' ' . $limit[1];
                                    } else {
                                        $nama = $limit[0];
                                    }
                                    echo $nama;
                                @endphp
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                data-popper-placement="bottom-start"
                                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 43px);">
                                <li>
                                    <a href="{{ route('auth.actLogout') }}" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <iconify-icon icon="solar:logout-3-broken" width="1.2em"
                                                height="1.2em"></iconify-icon>
                                            <span class="ms-1">Logout</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('auth.login') }}" class="btn btn-primary fw-semibold">
                            <div class="d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2">
                                        <path
                                            d="M8 16c0 2.828 0 4.243.879 5.121c.641.642 1.568.815 3.121.862M8 8c0-2.828 0-4.243.879-5.121C9.757 2 11.172 2 14 2h1c2.828 0 4.243 0 5.121.879C21 3.757 21 5.172 21 8v8c0 2.828 0 4.243-.879 5.121c-.768.769-1.946.865-4.121.877M3 9.5v5c0 2.357 0 3.535.732 4.268S5.643 19.5 8 19.5M3.732 5.232C4.464 4.5 5.643 4.5 8 4.5" />
                                        <path stroke-linejoin="round" d="M6 12h9m0 0l-2.5 2.5M15 12l-2.5-2.5" />
                                    </g>
                                </svg>
                                <span class="ms-1 fw-semibold">Login</span>
                            </div>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
