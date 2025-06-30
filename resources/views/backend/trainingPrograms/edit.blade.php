@extends('backend.layouts.app')

@section('content')
<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="container mx-auto">
        <div class="flex items-center justify-between mb-4">
            <h3>Edit Training Program</h3>
        </div>
        <div class="card adaptable-card">
            <div class="card-body">
                <form action="{{ route('updateTrainingProgram', $trainingProgram->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Add this to handle the PUT request -->

                    <div class="form-container vertical">
                        <div>
                            <h5>Training Program Information</h5>
                            <p>Edit the details below to update the training program.</p>
                        </div>

                        <!-- Program Name -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Program Name</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="text" name="name" placeholder="Program Name" value="{{ old('name', $trainingProgram->name) }}" required>
                            </div>
                        </div>

                        <!-- Source of Competency -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Source of Competency</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="text" name="source_of_competency" placeholder="Source of Competency" value="{{ old('source_of_competency', $trainingProgram->source_of_competency) }}">
                            </div>
                        </div>

                        <!-- Module Duration -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Module Duration (hours)</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="number" name="module_duration" placeholder="Module Duration" value="{{ old('module_duration', $trainingProgram->module_duration) }}">
                            </div>
                        </div>

                        <!-- Number of Trainees -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Number of Trainees</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="number" name="number_of_trainees" placeholder="Number of Trainees" value="{{ old('number_of_trainees', $trainingProgram->number_of_trainees) }}">
                            </div>
                        </div>

                        <!-- Training Duration -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Training Duration (months)</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="number" name="training_duration" placeholder="Training Duration" value="{{ old('training_duration', $trainingProgram->training_duration) }}">
                            </div>
                        </div>

                        <!-- Entry Requirements -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Entry Requirements</div>
                            <div class="col-span-2">
                                <input class="pl-8 input" type="text" name="entry_requirements" placeholder="Entry Requirements" value="{{ old('entry_requirements', $trainingProgram->entry_requirements) }}">
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Program Image</div>
                            <div class="col-span-2">
                                <div class="flex">
                                    @if($trainingProgram->image)
                                        <img src="{{ asset('storage/' . $trainingProgram->image) }}" alt="Program Image" class="w-10 h-auto mt-2">
                                    @endif
                                    <input class="pl-8 input" type="file" name="image" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <!-- Description with CKEditor -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Description</div>
                            <div class="col-span-2">
                                <textarea class="ckeditor" name="description">{{ old('description', $trainingProgram->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Modules (Dynamic Fields) -->
                        <div class="grid items-center gap-4 py-4 md:grid-cols-3">
                            <div class="font-semibold">Modules</div>
                            <div class="col-span-2">
                                <div id="modules-wrapper">
                                    <button type="button" class="mb-2 btn btn-solid" onclick="addModule()">+ Add Module</button>
                                    @foreach($trainingProgram->modules as $index => $module)
                                    <div class="flex items-center gap-2 mb-2 module-group">
                                        <input class="w-1/2 pl-8 input" type="text" name="modules[{{ $index }}][module_name]" placeholder="Module Name" value="{{ $module->module_name }}">
                                        <input class="w-1/3 pl-8 input" type="number" name="modules[{{ $index }}][module_duration]" placeholder="Duration (hours)" value="{{ $module->module_duration }}">
                                        <button type="button" class="btn btn-danger" onclick="removeModule(this)">Remove</button>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-2 mt-4 ltr:justify-end">
                            <button class="btn btn-default" type="reset">Reset</button>
                            <button class="btn btn-solid" type="submit">Update Program</button>
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

    let moduleIndex = {{ count($trainingProgram->modules) }};

    function addModule() {
        const wrapper = document.getElementById('modules-wrapper');
        const newModule = `
            <div class="flex items-center gap-2 mb-2 module-group">
                <input class="w-1/2 pl-8 input" type="text" name="modules[${moduleIndex}][module_name]" placeholder="Module Name">
                <input class="w-1/3 pl-8 input" type="number" name="modules[${moduleIndex}][module_duration]" placeholder="Duration (hours)">
                <button type="button" class="btn btn-danger" onclick="removeModule(this)">Remove</button>
            </div>`;
        wrapper.insertAdjacentHTML('beforeend', newModule);
        moduleIndex++;
    }

    function removeModule(button) {
        const moduleGroup = button.closest('.module-group');
        moduleGroup.remove();
    }
</script>
@endsection
