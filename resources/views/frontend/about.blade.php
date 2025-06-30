@extends('frontend.layouts.app')
@section('content')

    <section class="relative table w-full bg-no-repeat bg-cover bg-to py-36" style="background-image: url('https://taarifa.rw/wp-content/uploads/2024/07/download-3-860x476.jpeg')">
        <div class="absolute inset-0 bg-emerald-900/90"></div>
        <div class="container">
            <div class="grid grid-cols-1 mt-10 text-center">
                <h3 class="text-2xl font-medium leading-snug tracking-wide text-white md:text-3xl md:leading-snug">About Us</h3>
            </div>
        </div>
        <div class="absolute z-10 mx-3 text-center bottom-5 start-0 end-0">
            <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{ route('home') }}">SCAW</a></li>
                <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white" aria-current="page">About Us</li>
            </ul>
        </div>
    </section>
    <div class="relative">
        <div class="shape absolute start-0 end-0 sm:-bottom-px -bottom-[2px] overflow-hidden z-1 text-white dark:text-slate-900">
            <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="relative py-16 md:py-24">
        <div class="container md:pb-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-5 md:col-span-6">
                    <div class="relative">
                        <div class="relative">
                            <img src="https://www.debaterwanda.org/wp-content/uploads/2022/09/YVN_7597-scaled.jpg" class="lg:w-[400px] w-[280px] rounded-md shadow dark:shadow-gray-700" alt="">
                        </div>
                        <div class="absolute md:-end-5 end-0 -bottom-16">
                            <img src="https://resilient.digital-africa.co/wp-content/uploads/sites/2/2021/09/Ministry-of-Education-Rwanda-2.png" class="lg:w-[280px] w-[200px] border-8 border-white dark:border-slate-900 rounded-md shadow dark:shadow-gray-700" alt="">
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 md:col-span-6 mt-14 md:mt-0">
                    <div class="lg:ms-5">
                        <h3 class="mb-6 md:text-[26px] text-2xl md:leading-normal leading-normal font-semibold">Short Course <br> SCAW System</h3>

                        <p class="max-w-xl text-slate-400">
                            A platform where companies post training programs, and students apply to develop new skills and enhance their careers.
                        </p>

                        <ul class="mt-4 list-none text-slate-400">
                            <li class="flex mb-1"><i class="text-xl uil uil-check-circle text-emerald-600 me-2"></i> Post Training Programs</li>
                            <li class="flex mb-1"><i class="text-xl uil uil-check-circle text-emerald-600 me-2"></i> Apply for Courses</li>
                            <li class="flex mb-1"><i class="text-xl uil uil-check-circle text-emerald-600 me-2"></i> Course Accreditation Process</li>
                        </ul>

                        <div class="mt-6">
                            <a href="{{ route('contact') }}" class="mt-2 text-white rounded-md btn bg-emerald-600 hover:bg-emerald-700 border-emerald-600 hover:border-emerald-700"><i class="uil uil-envelope"></i> Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
