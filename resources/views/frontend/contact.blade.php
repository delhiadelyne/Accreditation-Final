@extends('frontend.layouts.app')
@section('content')

    <section class="relative table w-full bg-no-repeat bg-cover bg-to py-36" style="background-image: url('https://taarifa.rw/wp-content/uploads/2024/07/download-3-860x476.jpeg')">
        <div class="absolute inset-0 bg-emerald-900/90"></div>
        <div class="container">
            <div class="grid grid-cols-1 mt-10 text-center">
                <h3 class="text-2xl font-medium leading-snug tracking-wide text-white md:text-3xl md:leading-snug">Contact Us</h3>
            </div>
        </div>
        <div class="absolute z-10 mx-3 text-center bottom-5 start-0 end-0">
            <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{ route('home') }}">SCAW</a></li>
                <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white" aria-current="page">Contact Us</li>
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

    <section class="relative py-16 lg:py-24">
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-7 md:col-span-6">
                    <img src="https://shreethemes.in/jobstack/layouts/assets/images/svg/contact.svg" alt="">
                </div>

                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:ms-5">
                        <div class="p-6 bg-white rounded-md shadow dark:bg-slate-900 dark:shadow-gray-700">
                            <h3 class="mb-6 text-2xl font-semibold leading-normal">Get in touch !</h3>

                            <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="mb-5 lg:col-span-6">
                                        <label for="name" class="font-semibold">Your Name:</label>
                                        <input name="name" id="name" type="text" class="mt-2 border form-input border-slate-100 dark:border-slate-800" placeholder="Name :">
                                    </div>

                                    <div class="mb-5 lg:col-span-6">
                                        <label for="email" class="font-semibold">Your Email:</label>
                                        <input name="email" id="email" type="email" class="mt-2 border form-input border-slate-100 dark:border-slate-800" placeholder="Email :">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1">
                                    <div class="mb-5">
                                        <label for="subject" class="font-semibold">Your Question:</label>
                                        <input name="subject" id="subject" class="mt-2 border form-input border-slate-100 dark:border-slate-800" placeholder="Subject :">
                                    </div>

                                    <div class="mb-5">
                                        <label for="comments" class="font-semibold">Your Comment:</label>
                                        <textarea name="comments" id="comments" class="mt-2 border form-input border-slate-100 dark:border-slate-800 textarea" placeholder="Message :"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="submit" name="send" class="text-white rounded-md btn bg-emerald-600 hover:bg-emerald-700">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
