<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>SCAW</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Job Listing Landing Template" name="description">
        <meta content="Job, CV, Career, Resume, Job Portal, Create Job, Post job, tailwind Css" name="keywords">
        <meta name="author" content="Shreethemes">
        <meta name="website" content="https://shreethemes.in">
        <meta name="email" content="support@shreethemes.in">
        <meta name="version" content="1.5.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}">

        <!-- Css -->
        <link href="{{ asset('frontend/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
        <!-- Main Css -->
        <link href="{{ asset('frontend/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
        <link href="{{ asset('frontend/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('frontend/css/tailwind.min.css') }}" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <body class="dark:bg-slate-900">
        @include('frontend.inc.nav')

        @yield('content')

        @include('frontend.inc.footer')

        <a href="#" onclick="topFunction()" id="back-to-top" class="fixed z-10 items-center justify-center hidden text-lg text-center text-white rounded-full back-to-top bottom-5 end-5 size-9 bg-emerald-600"><i class="uil uil-arrow-up"></i></a>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if (session('success'))
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    });
                @endif

                @if (session('error'))
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    });
                @endif
            });
        </script>

        <script src="{{ asset('frontend/libs/tobii/js/tobii.min.js') }}"></script>
        <script src="{{ asset('frontend/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('frontend/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins.init.js') }}"></script>
        <script src="{{ asset('frontend/js/app.js') }}"></script>
    </body>
</html>
