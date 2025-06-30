@extends('backend.layouts.app')
@section('content')

<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h3><span style="text-transform: capitalize">{{ Auth::user()->role }}</span> Profile Update</h3>
        </div>
        <div class="card adaptable-card">
            <div class="card-body">
                <div class="tabs">
                    <div class="px-4 py-6 tab-content">
                        <form action="{{ route('updateInstitutionProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-container vertical">
                                <div>
                                    <h5 style="color: #065F46; font-weight: 700">Institution Information</h5>
                                    <p>Update your institution's details.</p>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Institution Name, Type & Physical Address</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="text" name="name" autocomplete="off" placeholder="Institution Name" value="{{ old('name', $institution->name ?? Auth::user()->name) }}">
                                            <input class="pl-8 input" type="text" name="type" autocomplete="off" placeholder="Course Type" value="{{ old('type', $institution->type) }}">
                                            <input class="pl-8 input" type="text" name="physical_address" autocomplete="off" placeholder="Physical Address" value="{{ old('physical_address', $institution->physical_address) }}">
                                    </div>
                                    </div>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Province & District</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="text" name="province" autocomplete="off" placeholder="Province" value="{{ old('province', $institution->province) }}">
                                            <input class="pl-8 input" type="text" name="district" autocomplete="off" placeholder="District" value="{{ old('district', $institution->district) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Sector, Cell & Village</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="text" name="sector" autocomplete="off" placeholder="Sector" value="{{ old('sector', $institution->sector) }}">
                                            <input class="pl-8 input" type="text" name="cell" autocomplete="off" placeholder="Cell" value="{{ old('cell', $institution->cell) }}">
                                            <input class="pl-8 input" type="text" name="village" autocomplete="off" placeholder="Village" value="{{ old('village', $institution->village) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Institution Phone & Email</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="text" name="phone" autocomplete="off" placeholder="Phone" value="{{ old('phone', $institution->phone) }}">
                                            <input class="pl-8 input" type="email" name="email" autocomplete="off" placeholder="Email" value="{{ old('email', $institution->email ?? Auth::user()->email) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <h3 style="color: #065F46">Owner Information</h3>
                                    <p>Details about the institution's owner.</p>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Owner Name, Phone, Email</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="text" name="owner_name" autocomplete="off" placeholder="Owner Name" value="{{ old('owner_name', $institution->owner_name) }}">
                                            <input class="pl-8 input" type="text" name="owner_phone" autocomplete="off" placeholder="Owner Phone" value="{{ old('owner_phone', $institution->owner_phone) }}">
                                            <input class="pl-8 input" type="email" name="owner_email" autocomplete="off" placeholder="Owner Email" value="{{ old('owner_email', $institution->owner_email) }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="mt-8">
                                    <h5>Contact Person Information</h5>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Contact Person Name, Phone & Email</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="text" name="contact_person_name" autocomplete="off" placeholder="Contact Person Name" value="{{ old('contact_person_name', $institution->contact_person_name) }}">
                                            <input class="pl-8 input" type="number" name="contact_person_phone" autocomplete="off" placeholder="Contact Person Phone" value="{{ old('contact_person_phone', $institution->contact_person_phone) }}">
                                            <input class="pl-8 input" type="email" name="contact_person_email" autocomplete="off" placeholder="Contact Person Email" value="{{ old('contact_person_email', $institution->contact_person_email) }}">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="mt-8">
                                    <h3 style="color: #065F46">Registration Information</h3>
                                </div>

                                <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                                    <div class="font-semibold">Registration Date & Number</div>
                                    <div class="col-span-2">
                                        <div class="flex">
                                            <input class="pl-8 input" type="date" name="registration_date" autocomplete="off" value="{{ old('registration_date', $institution->registration_date) }}">
                                            <input class="pl-8 input" type="text" name="registration_number" autocomplete="off" placeholder="Institution Number" value="{{ old('registration_number', $institution->registration_number) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex gap-2 mt-4 ltr:justify-end">
                                    <button class="btn btn-default" type="reset">Reset</button>
                                    <button class="btn btn-solid" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
