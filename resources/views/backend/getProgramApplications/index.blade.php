@extends('backend.layouts.app')

@section('content')
<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="container mx-auto">
        <div class="card adaptable-card">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <h3>Training Program Applications</h3>
                    <!-- Download Report Button -->
                    <a href="{{ route('trainingProgramApplicationsReport') }}" class="btn btn-solid">
                        Download Report (PDF)
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table id="training-program-requests-data-table" class="table-default table-hover data-table">
                        <thead>
                            <tr>
                                <th>Institution Name</th>
                                <th>Program Name</th>
                                <th>Source of Competency</th>
                                <th>Training Duration</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <td>{{ $request->trainingProgram->institution->name }}</td>
                                    <td>{{ $request->trainingProgram->name }}</td>
                                    <td>{{ $request->trainingProgram->source_of_competency }}</td>
                                    <td>{{ $request->trainingProgram->training_duration }} Months</td>
                                    <td>
                                        @if ($request->status == 'pending')
                                            <span class="text-white bg-yellow-100 border-0 rounded tag dark:text-yellow-100 dark:bg-yellow-500/20" style="background: orange;">Pending</span>
                                        @elseif ($request->status == 'rejected')
                                            <span class="text-white bg-red-100 border-0 rounded tag dark:text-red-100 dark:bg-red-500/20" style="background: red;">Rejected</span>
                                        @elseif ($request->status == 'approved')
                                            <span class="text-white bg-green-100 border-0 rounded tag dark:text-green-100 dark:bg-green-500/20" style="background: green;">Approved</span>
                                        @else
                                            <span class="w-full text-white bg-gray-500 border-gray-500 rounded-md btn hover:bg-gray-600 hover:border-gray-600 md:ms-2 md:w-auto" style="background: gray;">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('trainingRequestDetails', $request->id) }}" class="text-white bg-yellow-100 border-0 rounded tag dark:text-yellow-100 dark:bg-yellow-500/20" style="background: blue;">
                                            View Details
                                        </a>
                                        @if ($request->status == 'pending')
                                            <form action="{{ route('approveApplication', $request->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="text-white bg-green-100 border-0 rounded tag dark:text-green-100 dark:bg-green-500/20" style="background: green;">Approve</button>
                                            </form>

                                            <form action="{{ route('rejectApplication', $request->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="text-white bg-red-100 border-0 rounded tag dark:text-red-100 dark:bg-red-500/20" style="background: red;">Reject</button>
                                            </form>
                                        @else
                                            <span class="text-slate-500">{{ ucfirst($request->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
