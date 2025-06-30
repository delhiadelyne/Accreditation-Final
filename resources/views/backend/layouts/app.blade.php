<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title>SCAW</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div id="root">
            <div class="flex flex-col flex-auto app-layout-modern">
                <div class="flex flex-auto min-w-0">
                    @include('backend.inc.sidebar')
                    <div class="relative flex flex-col flex-auto w-full min-w-0 min-h-screen bg-white border-l border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        @include('backend.inc.header')
                        <div class="flex flex-col justify-between flex-auto h-full">
                            <main class="h-full">
                                <div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
                                    @yield('content')
                                </div>
                            </main>
                            @include('backend.inc.footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if (session('success'))
                    Swal.fire({
                        position: 'top',
                        icon: 'success',
                        title: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    });
                @endif

                @if (session('error'))
                    Swal.fire({
                        position: 'top',
                        icon: 'error',
                        title: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    });
                @endif
            });
        </script>
        <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/vendors/datatables/dataTables.custom-ui.min.js') }}"></script>
        <script src="{{ asset('backend/js/product-list.js') }}"></script>
        <script src="{{ asset('backend/js/app.min.js') }}"></script>
    </body>
</html>
