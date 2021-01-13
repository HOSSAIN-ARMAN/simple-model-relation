<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title', 'dashboard')</title>

    <link href="{{ asset('/') }}admin/css/styles.css" rel="stylesheet" />
{{--    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />--}}

    <link href="{{ asset('/') }}admin/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>--}}
    <script src="{{ asset('/') }}admin/js/all.min.js" crossorigin="anonymous"></script>


    @stack('css')
</head>
<body class="sb-nav-fixed">

<div id="layoutSidenav">

    @include('admin.include-folder.header')
    @include('admin.include-folder.sidebar')

    <div id="layoutSidenav_content">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm">--}}
{{--                    @yield('module', 'none')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <hr>--}}
        <main>
            <div class="container-fluid">
               @yield('content', 'dashboard')
            </div>
        </main>
    </div>
</div>

{{--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>--}}
<script src="{{ asset('/') }}admin/js/jquery-3.5.1.slim.min.js"></script>

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>--}}
<script src="{{ asset('/') }}admin/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('/') }}admin/js/scripts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
{{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>--}}
<script src="{{ asset('/') }}admin/js/jquery.dataTables.min.js"></script>
{{--<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>--}}

<script src="{{ asset('/') }}admin/js/dataTables.bootstrap4.min.js"></script>

<script src="{{ asset('/') }}admin/assets/demo/datatables-demo.js"></script>


<!-- this part for sweet alert -->
<script src="{{ asset('/') }}admin/js/sweetalert2.min.js"></script>

<script type="text/javascript">
    @if(session()->get('message'))
    swal.fire({
        title: "Success",
        html: "<b>{{ session()->get('message') }}</b>",
        type: "success",
        timer: 1000
    });
    @elseif(session()->get('message-number'))
    swal.fire({
        title: "Success",
        html: "<b>{!! session()->get('message-number') !!}</b>",
        // type: "success",
        timer: 30000
    });
    @elseif(session()->get('error'))
    swal.fire({
        title: "Error",
        html: "<b>{{ session()->get('error') }}</b>",
        type: "error",
        timer: 1000
    });
    @endif
    $('.success').fadeIn('slow').delay(10000).fadeOut('slow');
</script>

@stack('js')
</body>
</html>
