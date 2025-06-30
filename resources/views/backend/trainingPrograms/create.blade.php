@extends('backend.layouts.app')

@section('content')
<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h3>Create Training Program</h3>
        </div>
        <div class="card adaptable-card">
            <div class="card-body">
                <form action="{{ route('storeTrainingProgram') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-container vertical">
                        <div>
                            <h5>Training Program Information</h5>
                            <p>Fill out the details below to create a new training program.</p>
                        </div>

                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Program Name</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="text" name="name" placeholder="Program Name" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Source of Competency</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="text" name="source_of_competency" placeholder="Source of Competency" value="{{ old('source_of_competency') }}">
                            </div>
                        </div>

                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Module Duration (hours)</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="number" name="module_duration" placeholder="Module Duration" value="{{ old('module_duration') }}">
                            </div>
                        </div>

                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Number of Trainees</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="number" name="number_of_trainees" placeholder="Number of Trainees" value="{{ old('number_of_trainees') }}">
                            </div>
                        </div>

                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Training Duration (months)</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="number" name="training_duration" placeholder="Training Duration" value="{{ old('training_duration') }}">
                            </div>
                        </div>

                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Entry Requirements</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="text" name="entry_requirements" placeholder="Entry Requirements" value="{{ old('entry_requirements') }}">
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Program Image</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="file" name="image" accept="image/*">
                            </div>
                        </div>

                        <!-- Description with CKEditor -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Description</div>
                            <div class="col-span-2">
                                <textarea class="ckeditor" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- Modules (Dynamic Fields) -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Modules</div>
                            <div class="col-span-2">
                                <div id="modules-wrapper">
                                    <button type="button" class="mb-2 btn btn-solid" onclick="addModule()">+ Add Module</button>

                                    <!-- Existing Module Groups -->
                                    <div class="flex items-center gap-2 mb-2 module-group">
                                        <input class="w-1/2 pl-8 input" type="text" name="modules[0][module_name]" placeholder="Module Name">
                                        <input class="w-1/3 pl-8 input" type="number" name="modules[0][module_duration]" placeholder="Duration (hours)">
                                        <button type="button" class="btn btn-danger" onclick="removeModule(this)">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-2 mt-4 ltr:justify-end">
                            <button class="btn btn-default" type="reset">Reset</button>
                            <button class="btn btn-solid" type="submit">Create Program</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CKEditor & Dynamic Module Script -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

    let moduleCount = 1;

    function addModule() {
        const moduleWrapper = document.getElementById('modules-wrapper');
        const newModuleGroup = document.createElement('div');
        newModuleGroup.classList.add('module-group', 'flex', 'gap-2', 'items-center', 'mb-2');

        newModuleGroup.innerHTML = `
            <input class="w-1/2 pl-8 input" type="text" name="modules[${moduleCount}][module_name]" placeholder="Module Name">
            <input class="w-1/3 pl-8 input" type="number" name="modules[${moduleCount}][module_duration]" placeholder="Duration (hours)">
            <button type="button" class="btn btn-danger" onclick="removeModule(this)">Remove</button>
        `;
        moduleWrapper.appendChild(newModuleGroup);
        moduleCount++;
    }

    function removeModule(button) {
        const moduleGroup = button.closest('.module-group');
        moduleGroup.remove();
    }
</script>
@endsection
