@extends('backend.layouts.app')

@section('content')
<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="flex flex-col gap-4">
        @if(isset($error))
            <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $error }}</span>
            </div>
        @else
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 xl:grid-cols-4">
                @if(auth()->user()->role === 'admin')
                    <div class="card card-layout-frame">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <span class="text-3xl text-indigo-600 bg-indigo-100 avatar avatar-rounded dark:bg-indigo-500/20 dark:text-indigo-100 avatar-lg" data-avatar-size="55">
                                    <span class="avatar-icon">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                                <div>
                                    <div class="flex gap-1.5 items-end mb-2">
                                        <h3 class="font-bold leading-none">{{ $totalInstitutions }}</h3>
                                        <p class="font-semibold">Institutions</p>
                                    </div>
                                    <p class="flex items-center gap-1">
                                        <span class="flex items-center gap-1 rounded-full">
                                            <span class="p-1 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-100">
                                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                            </span>
                                            <span class="font-semibold text-emerald-600">+ {{ $newInstitutionsThisMonth }}</span>
                                        </span>
                                        <span>this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-layout-frame">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <span class="text-3xl avatar avatar-rounded bg-cyan-100 text-cyan-600 dark:bg-cyan-500/20 dark:text-cyan-100 avatar-lg" data-avatar-size="55">
                                    <span class="avatar-icon">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </span>
                                </span>
                                <div>
                                    <div class="flex gap-1.5 items-end mb-2">
                                        <h3 class="font-bold leading-none">{{ $totalApplications }}</h3>
                                        <p class="font-semibold">Applications</p>
                                    </div>
                                    <p class="flex items-center gap-1">
                                        <span class="flex items-center gap-1 rounded-full">
                                            <span class="p-1 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-100">
                                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                            </span>
                                            <span class="font-semibold text-emerald-600">+ {{ $newApplicationsThisMonth }}</span>
                                        </span>
                                        <span>this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if(auth()->user()->role === 'institution')
                    <div class="card card-layout-frame">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <span class="text-3xl avatar avatar-rounded bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-100 avatar-lg" data-avatar-size="55">
                                    <span class="avatar-icon">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                                <div>
                                    <div class="flex gap-1.5 items-end mb-2">
                                        <h3 class="font-bold leading-none">{{ $totalTrainingPrograms }}</h3>
                                        <p class="font-semibold">Training Programs</p>
                                    </div>
                                    <p class="flex items-center gap-1">
                                        <span class="flex items-center gap-1 rounded-full">
                                            <span class="p-1 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-100">
                                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                            </span>
                                            <span class="font-semibold text-emerald-600">+ {{ $newTrainingProgramsThisMonth }}</span>
                                        </span>
                                        <span>this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-layout-frame">
                        <div class="card-body">
                            <div class="flex items-center gap-4">
                                <span class="text-3xl avatar avatar-rounded bg-amber-100 text-amber-600 dark:bg-amber-500/20 dark:text-amber-100 avatar-lg" data-avatar-size="55">
                                    <span class="avatar-icon">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                </span>
                                <div>
                                    <div class="flex gap-1.5 items-end mb-2">
                                        <h3 class="font-bold leading-none">{{ $totalApplications }}</h3>
                                        <p class="font-semibold">Applications</p>
                                    </div>
                                    <p class="flex items-center gap-1">
                                        <span class="flex items-center gap-1 rounded-full">
                                            <span class="p-1 rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-100">
                                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                </svg>
                                            </span>
                                            <span class="font-semibold text-emerald-600">+ {{ $newApplicationsThisMonth }}</span>
                                        </span>
                                        <span>this month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>
@endsection
