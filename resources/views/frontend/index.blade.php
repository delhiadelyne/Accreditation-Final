@extends('frontend.layouts.app')
@section('content')

    @include('frontend.inc.hero')

    <section class="relative py-16 bg-slate-50 dark:bg-slate-800 md:py-24">
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 md:text-[26px] md:leading-normal text-2xl leading-normal font-semibold">Popular Trainings</h3>

                <p class="max-w-xl mx-auto text-slate-400">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto, iste laudantium officiis dolore hic natus reiciendis architecto eaque repudiandae tempore!
                </p>
            </div>

            @auth
                <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    @foreach ($trainingPrograms as $program)
                        <div class="relative overflow-hidden transition-all duration-500 bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-md dark:shadow-gray-700 dark:hover:shadow-gray-700 hover:-mt-2 h-fit">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <div class="size-14 min-w-[56px] flex items-center justify-center bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-md">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/Facebook_Logo_2023.png" class="size-8" alt="">
                                    </div>

                                    <div class="ms-3">
                                        <a href="{{ route('getTradeDetails', $program->id) }}" class="inline-block text-[16px] font-semibold hover:text-emerald-600 transition-all duration-500 me-1">
                                            {{ $program->name }}
                                        </a>
                                        <span class="inline-block text-sm text-slate-400">{{ $program->created_at->diffForHumans() }}</span>
                                        <div>
                                            <span class="inline-block text-sm font-medium me-1">Tratining Duration: <span class="text-slate-400">{{ $program->training_duration }} Months</span></span>
                                            <span class="inline-block text-sm font-medium me-1">Modules Duration: <span class="text-slate-400">{{ $program->module_duration }} hrs</span></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h4 class="font-semibold">Modules:</h4>
                                    @foreach($program->modules as $module)
                                    <span class="bg-slate-100 dark:bg-slate-800 inline-block text-slate-900 dark:text-slate-300 text-xs px-2.5 py-0.5 font-semibold rounded-full me-1">
                                            {{ $module->module_name }} ({{ $module->module_duration }} hrs)
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="items-center justify-between px-6 py-2 bg-slate-50 dark:bg-slate-800 lg:flex">
                                <div class="flex justify-between lg:inline-block">
                                    <span class="inline-block me-1 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20"><g fill="{{ route('getTradeDetails', $program->id) }}000"><path fill-rule="evenodd" d="M15.69 9.534a3 3 0 0 1 1.859 1.925l1.301 4.05c.512 1.594-.33 3.312-1.879 3.838a2.9 2.9 0 0 1-.927.153h-8.09C6.324 19.5 5 18.14 5 16.462c0-.323.05-.645.15-.952l1.3-4.05a3 3 0 0 1 1.86-1.926C8.116 8.901 8 8.297 8 7.786C8 5.419 9.79 3.5 12 3.5s4 1.919 4 4.286c0 .511-.115 1.115-.31 1.748" clip-rule="evenodd" opacity="0.2"/><path fill-rule="evenodd" d="M10 8.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0-3a1 1 0 1 1 0 2a1 1 0 0 1 0-2" clip-rule="evenodd"/><path fill-rule="evenodd" d="M5.5 6.286C5.5 8.959 8.153 13.5 10 13.5c1.848 0 4.5-4.541 4.5-7.214C14.5 3.65 12.493 1.5 10 1.5S5.5 3.65 5.5 6.286m8 0c0 2.193-2.348 6.214-3.5 6.214c-1.151 0-3.5-4.02-3.5-6.214C6.5 4.187 8.075 2.5 10 2.5s3.5 1.687 3.5 3.786" clip-rule="evenodd"/><path d="M13.435 9.14a.5.5 0 0 1 .369-.929a3 3 0 0 1 1.74 1.84l1.334 4A3 3 0 0 1 14.03 18H5.97a3 3 0 0 1-2.846-3.949l1.333-4A3 3 0 0 1 6.24 8.194a.5.5 0 1 1 .355.935a2 2 0 0 0-1.19 1.239l-1.333 4A2 2 0 0 0 5.97 17h8.062a2 2 0 0 0 1.897-2.633l-1.332-4a2 2 0 0 0-1.16-1.226"/></g></svg>
                                        {{ $program->institution->physical_address }}
                                    </span>
                                </div>

                                <a href="{{ route('getTradeDetails', $program->id) }}" class="w-full mt-4 text-white rounded-md btn btn-sm bg-emerald-600 hover:bg-emerald-700 border-emerald-600 hover:border-emerald-700 md:ms-2 lg:w-auto lg:mt-0">Apply Now</a>
                            </div>

                            <a href="" class="absolute top-0 m-3 rounded-full btn btn-icon bg-emerald-600/5 hover:bg-emerald-600 border-emerald-600/10 hover:border-emerald-600 text-emerald-600 hover:text-white end-0"><i data-feather="bookmark" class="size-4"></i></a>
                        </div>
                    @endforeach
                </div>

                <div class="grid grid-cols-1 mt-8 md:grid-cols-12">
                    <div class="text-center md:col-span-12">
                        <a href="{{ route('getTrades') }}" class="duration-500 ease-in-out btn btn-link text-slate-400 hover:text-emerald-600 after:bg-emerald-600">
                            See More Trainings
                            <i class="align-middle uil uil-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 pb-8 text-center">
                    <p class="max-w-xl mx-auto text-slate-400">
                        <a href="{{ route('login') }}" class="text-emerald-600">Login</a> to apply in training programs
                    </p>
                </div>
            @endauth
        </div>
    </section>

@endsection
