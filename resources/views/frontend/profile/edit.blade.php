@extends('frontend.layouts.app')
@section('content')
    <section class="relative lg:mt-24 mt-[74px] pb-16">
        <div class="lg:container container-fluid">
            <div class="relative text-transparent profile-banner">
                <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)" />
                <div class="relative shrink-0">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/KCC_Wallpaper_by_Mudahunga.jpg" class="object-cover w-full h-64 shadow lg:rounded-xl dark:shadow-gray-700" id="profile-banner" alt="">
                    <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                </div>
            </div>

            <div class="mx-4 -mt-12 md:flex">
                <div class="md:w-full">
                    <div class="relative flex items-end">
                        <div class="text-center profile-pic">
                            <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                            <div>
                                <div class="relative size-28 max-w-[112px] max-h-[112px] mx-auto">
                                    <img src="https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg" class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>
                            </div>
                        </div>
                        <div class="ms-4">
                            <h5 class="text-lg font-semibold">{{ $user->name }}</h5>
                            <p class="text-slate-400">Trainner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-16">
            <div class="grid lg:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-12">
                    <div class="p-6 bg-white rounded-md shadow dark:shadow-gray-800 dark:bg-slate-900">
                        <h5 class="mb-4 text-lg font-semibold">Personal Detail :</h5>
                        <form action="{{ route('updateTraineeProfile', $user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 lg:grid-cols-12 md:grid-cols-2">
                                <div class="lg:col-span-6">
                                    <label class="font-medium form-label">Name : <span class="text-red-600">*</span></label>
                                    <input type="text" class="mt-2 border form-input border-slate-100 dark:border-slate-800" value="{{ $user->name }}" name="name" required>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-medium form-label">Email : <span class="text-red-600">*</span></label>
                                    <input type="email" class="mt-2 border form-input border-slate-100 dark:border-slate-800" value="{{ $user->email }}" name="email" required>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-medium form-label">Date of Birth :</label>
                                    <input type="date" class="mt-2 border form-input border-slate-100 dark:border-slate-800" value="{{ $trainee->date_of_birth ?? '' }}" name="date_of_birth">
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-medium form-label">Address :</label>
                                    <input type="text" class="mt-2 border form-input border-slate-100 dark:border-slate-800" value="{{ $trainee->address ?? '' }}" name="address">
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-medium form-label">Phone :</label>
                                    <input type="text" class="mt-2 border form-input border-slate-100 dark:border-slate-800" value="{{ $trainee->phone ?? '' }}" name="phone">
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-medium form-label">Education Level :</label>
                                    <select class="mt-2 border form-input border-slate-100 dark:border-slate-800" name="education_level">
                                        <option>Choose Education Level</option>
                                        <option value="High School" {{ (isset($trainee->education_level) && $trainee->education_level == 'High School') ? 'selected' : '' }}>High School</option>
                                        <option value="University" {{ (isset($trainee->education_level) && $trainee->education_level == 'University') ? 'selected' : '' }}>University</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="mt-5 text-white rounded-md btn bg-emerald-600 hover:bg-emerald-700">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
