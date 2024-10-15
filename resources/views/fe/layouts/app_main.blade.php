<!doctype html>
<html lang="en">

<head>
    @include('fe.layouts.app_head')
</head>

{{-- f4f7fb --}}
<body style="background:#fff; margin-top: 100px;">
    {{-- navbar --}}
    @include('fe.layouts.app_navbar')

    <div class="container">

        @yield('content')

        @include('fe.layouts.app_footer')
    </div>
    @include('fe.layouts.app_script')
</body>

</html>
