@extends('backend.layouts.app')

@section('content')
<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="container mx-auto">
        <div class="shadow-lg card adaptable-card">
            <div class="flex items-center justify-between p-4 border-b card-header">
                <h3 class="text-lg font-semibold text-gray-800">Training Program Application Details</h3>
                <a href="{{ route('trainingRequests') }}" class="btn btn-sm btn-outline">Back to Requests</a>
            </div>
            <div class="p-6 card-body">
                <div class="flex items-start gap-6">
                    <div class="w-1/2">
                        @if($request->trainingProgram->image)
                            <img src="{{ asset('storage/' . $request->trainingProgram->image) }}" alt="{{ $request->trainingProgram->name }}" class="w-24 h-auto rounded-lg shadow-sm">
                        @else
                            <img src="https://media.istockphoto.com/id/1352945762/vector/no-image-available-like-missing-picture.jpg?s=612x612&w=0&k=20&c=4X-znbt02a8EIdxwDFaxfmKvUhTnLvLMv1i1f3bToog=" alt="Default Image" class="w-full h-auto rounded-lg shadow-sm">
                        @endif
                    </div>

                    <!-- Program and Application Details -->
                    <div class="w-2/3">
                        <!-- Program Details -->
                        <div class="mb-4">
                            <h4 class="text-xl font-bold">{{ $request->trainingProgram->name }}</h4>
                            <p class="mb-2 text-gray-600"><strong>Institution:</strong> {{ $request->trainingProgram->institution->name }}</p>
                            <p class="mb-2 text-gray-600"><strong>Source of Competency:</strong> {{ $request->trainingProgram->source_of_competency }}</p>
                            <p class="mb-2 text-gray-600"><strong>Module Duration:</strong> {{ $request->trainingProgram->module_duration }} hours</p>
                            <p class="mb-2 text-gray-600"><strong>Training Duration:</strong> {{ $request->trainingProgram->training_duration }} weeks</p>
                            <p class="mb-2 text-gray-600"><strong>Number of Trainees:</strong> {{ $request->trainingProgram->number_of_trainees }}</p>
                            <p class="mb-2 text-gray-600"><strong>Entry Requirements:</strong> {{ $request->trainingProgram->entry_requirements }}</p>
                            <p class="mb-2 text-gray-600"><strong>Description:</strong> {!! $request->trainingProgram->description !!}</p>
                        </div>

                        <!-- Application Details -->
                        <div class="mb-4">
                            <h4 class="text-lg font-bold">Application Information</h4>
                            <p class="text-gray-600"><strong>Status:</strong> {{ ucfirst($request->status) }}</p>
                            @if($request->reason)
                                <p class="text-gray-600"><strong>Admin Comments:</strong> {{ $request->reason }}</p>
                            @endif
                        </div>

                        <!-- Applicant Details -->
                        <div class="mb-4">
                            <h4 class="text-lg font-bold">Applicant Information</h4>
                            <p class="text-gray-600"><strong>Applicant Name:</strong> {{ $request->user->name }}</p>
                            <p class="text-gray-600"><strong>Email:</strong> {{ $request->user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
