<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title>SCAW - Sign In</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
    </head>
    <body>
        <div id="root">
            <div class="app-layout-blank flex flex-auto flex-col h-[100vh]">
                <div class="flex flex-col justify-between flex-auto h-full">
                    <main class="h-full">
                        <div class="relative flex flex-col flex-auto h-full page-container">
                            <div class="grid h-full lg:grid-cols-3">
                                <div class="flex flex-col items-center justify-center bg-white dark:bg-gray-800">
                                    <div class="xl:min-w-[450px] px-8">
                                        <div class="mb-8">
                                            <h3 class="mb-1">Welcome back!</h3>
                                            <p>Please enter your credentials to sign in!</p>
                                        </div>
                                        <div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="form-container vertical">
                                                    <div class="form-item vertical">
                                                        <label class="mb-2 form-label">Email Address</label>
                                                        <div>
                                                            <input
                                                                class="input"
                                                                type="email"
                                                                name="email"
                                                                placeholder="Email Address"
                                                                value="{{ old('email') }}"
                                                                required
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="form-item vertical">
                                                        <label class="mb-2 form-label">Password</label>
                                                        <div>
                                                            <span class="input-wrapper">
                                                                <input
                                                                    class="pr-8 input"
                                                                    type="password"
                                                                    name="password"
                                                                    placeholder="Password"
                                                                    required
                                                                >
                                                                <div class="input-suffix-end">
                                                                    <span class="text-xl cursor-pointer">
                                                                        <svg
                                                                            stroke="currentColor"
                                                                            fill="none"
                                                                            stroke-width="2"
                                                                            viewBox="0 0 24 24"
                                                                            aria-hidden="true"
                                                                            height="1em"
                                                                            width="1em"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                        >
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-between mb-6">
                                                        <label class="mb-0 checkbox-label">
                                                            <input class="checkbox" type="checkbox" name="remember">
                                                            <span class="ltr:ml-2 rtl:mr-2">Remember Me</span>
                                                        </label>
                                                        <a class="text-primary-600 hover:underline" href="{{ route('password.request') }}">Forgot Password?</a>
                                                    </div>
                                                    <button class="w-full btn btn-solid" type="submit">Sign In</button>
                                                    <div class="mt-4 text-center">
                                                        <span>Don't have an account yet?</span>
                                                        <a class="text-primary-600 hover:underline" href="{{ route('register') }}">Sign up</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-col justify-between hidden col-span-2 px-16 py-6 bg-[#4f46e5] bg-no-repeat bg-cover dark:bg-gray-800 lg:flex"
                                     style="background-image: url('{{ asset('https://rwandaequip.org.rw/wp-content/uploads/2023/01/RV5_1504-1024x682.jpg') }}'); background-size: cover; background-position: center;">
                                    <div class="logo">
                                        <a href="{{ route('home') }}">
                                            <h2 class="text-white">SCAW</h2>
                                        </a>
                                    </div>
                                    <div>
                                        <h3 class="mb-4 text-white">Welcome</h3>
                                        <p class="text-lg text-white opacity-80 max-w-[700px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto soluta eum commodi non temporibus saepe! Dicta error culpa alias, maxime dolores fugit accusamus beatae recusandae dolor, quod voluptates perferendis quaerat?</p>
                                    </div>
                                    <span class="text-white">
                                        Copyright © 2024
                                        <span class="font-semibold">Accredition</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
        <script src="{{ asset('backend/js/app.min.js') }}"></script>
    </body>
</html>
