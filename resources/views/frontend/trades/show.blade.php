@extends('frontend.layouts.app')
@section('content')

    <section class="relative table w-full py-36 bg-[url('https://upload.wikimedia.org/wikipedia/commons/7/78/KCC_Wallpaper_by_Mudahunga.jpg')] bg-top bg-no-repeat bg-cover">
        <div class="absolute inset-0 bg-emerald-900/90"></div>
        <div class="container">
            <div class="grid grid-cols-1 mt-10 text-center">
                <h3 class="text-2xl font-medium leading-snug tracking-wide text-white md:text-3xl md:leading-snug">{{ $program->name }}</h3>
            </div>
        </div>

        <div class="absolute z-10 mx-3 text-center bottom-5 start-0 end-0">
            <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
            <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{ route('getTrades') }}">Trainings</a></li>
                <li class="inline breadcrumb-item text-[15px] font-semibold duration-500 ease-in-out text-white" aria-current="page">Job Detail</li>
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
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-6">
                    <div class="sticky bg-white rounded-md shadow dark:shadow-gray-700 dark:bg-slate-900 top-20">
                        <div class="p-6">
                            <h5 class="text-lg font-semibold">Program Information</h5>
                        </div>
                        <div class="p-6 border-t border-slate-100 dark:border-t-gray-700">
                            <ul class="list-none">
                                <li class="flex items-center">
                                    <i data-feather="user-check" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Institution Name:</p>
                                        <span class="text-sm font-medium text-emerald-600">{{ $program->institution->name }}</span>
                                    </div>
                                </li>

                                <li class="flex items-center mt-3">
                                    <i data-feather="map-pin" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Location:</p>
                                        <span class="text-sm font-medium text-emerald-600">{{ $program->institution->physical_address }}</span>
                                    </div>
                                </li>

                                <li class="flex items-center mt-3">
                                    <i data-feather="monitor" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Program:</p>
                                        <span class="text-sm font-medium text-emerald-600">{{ $program->name }}</span>
                                    </div>
                                </li>

                                <li class="flex items-center mt-3">
                                    <i data-feather="briefcase" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Training Duration:</p>
                                        <span class="text-sm font-medium text-emerald-600">{{ $program->training_duration }}</span>
                                    </div>
                                </li>

                                <li class="flex items-center mt-3">
                                    <i data-feather="book" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Entry Requirements:</p>
                                        <span class="text-sm font-medium text-emerald-600">{{ $program->entry_requirements }}</span>
                                    </div>
                                </li>

                                <li class="flex items-center mt-3">
                                    <i data-feather="dollar-sign" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Source of Competency</p>
                                        <span class="text-sm font-medium text-emerald-600">{{ $program->source_of_competency }}</span>
                                    </div>
                                </li>

                                <li class="flex items-center mt-3">
                                    <i data-feather="clock" class="size-5"></i>

                                    <div class="ms-4">
                                        <p class="font-medium">Date posted:</p>
                                        <span class="text-sm font-medium text-emerald-600">
                                            {{ $program->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 md:col-span-6">
                    <h4 class="font-semibold">Modules:</h4>
                    @foreach($program->modules as $module)
                    <span class="bg-slate-100 dark:bg-slate-800 inline-block text-slate-900 dark:text-slate-300 text-xs px-2.5 py-0.5 font-semibold rounded-full me-1">
                            {{ $module->module_name }} ({{ $module->module_duration }} hrs)
                        </span>
                    @endforeach

                    <h5 class="text-lg font-semibold">Training Description:</h5>

                    <p class="mt-4 text-slate-400">
                        {!! $program->description !!}
                    </p>

                    <form action="{{ route('programApply', $program->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-white rounded-md bg-emerald-600">Apply Now</button>
                    </form>
                </div>
            </div>
        </div>

@endsection
