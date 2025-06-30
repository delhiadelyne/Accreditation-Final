<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCAW - Sign Up</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div id="root">
        <div class="app-layout-blank flex flex-auto flex-col h-[100vh]">
            <div class="flex flex-col justify-between flex-auto h-full">
                <main class="h-full">
                    <div class="relative flex flex-col flex-auto h-full page-container">
                        <div class="grid h-full lg:grid-cols-3">
                            <div class="flex-col justify-between hidden col-span-2 px-16 py-6 bg-[#4f46e5] bg-no-repeat bg-cover dark:bg-gray-800 lg:flex" style="background-image: url({{ asset('https://live.staticflickr.com/65535/52725743613_1af8ed0fd5_z.jpg') }});">
                                <div class="logo">
                                    <a href="{{ route('home') }}">
                                        <h2 class="text-white">SCAW</h2>
                                    </a>
                                </div>
                                <div>
                                    <h3 class="mb-4 text-white">Welcome</h3>
                                    <p class="text-lg text-white opacity-80 max-w-[700px]">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                                </div>
                                <span class="text-white">
                                    Copyright © 2024
                                    <span class="font-semibold">Accredition</span>
                                </span>
                            </div>
                            <div class="flex flex-col items-center justify-center bg-white dark:bg-gray-800">
                                <div class="xl:min-w-[450px] px-8">
                                    <div class="mb-8">
                                        <h3 class="mb-1">Sign Up</h3>
                                        <p>And let's get started with your free trial</p>
                                    </div>
                                    <div>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-container vertical">
                                                <div class="form-item vertical">
                                                    <label class="mb-2 form-label">Role</label>
                                                    <div>
                                                        <select class="input" name="role">
                                                            <option value="user">User</option>
                                                            <option value="institution">Institution</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-item vertical">
                                                    <label class="mb-2 form-label">Name</label>
                                                    <div>
                                                        <input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                                    </div>
                                                    @if($errors->has('name'))
                                                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-item vertical">
                                                    <label class="mb-2 form-label">Email</label>
                                                    <div>
                                                        <input class="input" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                                    </div>
                                                    @if($errors->has('email'))
                                                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-item vertical">
                                                    <label class="mb-2 form-label">Password</label>
                                                    <div>
                                                        <input class="input" type="password" name="password" placeholder="Password">
                                                    </div>
                                                    @if($errors->has('password'))
                                                        <span class="text-red-500">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-item vertical">
                                                    <label class="mb-2 form-label">Confirm Password</label>
                                                    <div>
                                                        <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password">
                                                    </div>
                                                </div>

                                                <button class="w-full btn btn-solid" type="submit">Sign Up</button>
                                                <div class="mt-4 text-center">
                                                    <span>Already have an account?</span>
                                                    <a class="text-primary-600 hover:underline" href="{{ route('login') }}">Sign In</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

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
