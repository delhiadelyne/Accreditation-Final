@extends('backend.layouts.app')

@section('content')
<div class="relative flex flex-col flex-auto h-full px-4 py-4 page-container sm:px-6 md:px-8 sm:py-6">
    <div class="container mx-auto">
        <div class="card adaptable-card">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <h3>Program Applications</h3>
                    <a href="{{ route('generateProgramApplicationsReport') }}" class="btn btn-solid">Download Applications Report (PDF)</a>
                </div>
                <div class="overflow-x-auto">
                    <table id="training-program-list-data-table" class="table-default table-hover data-table">
                        <thead>
                            <tr>
                                <th>Program</th>
                                <th>Name</th>
                                <th>DOB</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Education Level</th>
                                <th>Update Status</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->trainingProgram->name }}</td>
                                    <td>{{ $application->trainee->user->name }}</td>
                                    <td>{{ $application->trainee->date_of_birth }}</td>
                                    <td>{{ $application->trainee->phone }}</td>
                                    <td>{{ $application->trainee->address }}</td>
                                    <td>{{ $application->trainee->education_level }}</td>
                                    <td>
                                        <!-- Update Status Button -->
                                        <button class="w-60 btn btn-solid open-status-modal"
                                                data-application-id="{{ $application->id }}"
                                                data-current-status="{{ $application->status }}">
                                            Update Status
                                        </button>
                                    </td>
                                    <td>
                                        @if ($application->status == 'Pending')
                                            <span class="w-full text-white bg-yellow-500 border-yellow-500 rounded-md btn hover:bg-yellow-600 hover:border-yellow-600 md:ms-2 md:w-auto">Pending</span>
                                        @elseif ($application->status == 'Rejected')
                                            <span class="w-full text-white bg-red-500 border-red-500 rounded-md btn hover:bg-red-600 hover:border-red-600 md:ms-2 md:w-auto">Rejected</span>
                                        @elseif ($application->status == 'Approved')
                                            <span class="w-full text-white bg-green-500 border-green-500 rounded-md btn hover:bg-green-600 hover:border-green-600 md:ms-2 md:w-auto">Approved</span>
                                        @else
                                            <span class="w-full text-white bg-gray-500 border-gray-500 rounded-md btn hover:bg-gray-600 hover:border-gray-600 md:ms-2 md:w-auto">Unknown</span>
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

<!-- Status Update Modal -->
<div id="status-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden px-24 bg-gray-600 bg-opacity-50">
    <div class="px-24 bg-white rounded-lg shadow-lg">
        <h3 class="mb-4 text-xl font-bold">Update Application Status</h3>
        <form id="update-status-form">
            <input type="hidden" id="application-id" name="application_id">
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Select Status</label>
                <select id="status" name="status" class="block w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Approved">Approved</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="button" class="mr-2 btn btn-outline" id="close-modal">Cancel</button>
                <button type="submit" class="btn btn-solid">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('status-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const updateStatusForm = document.getElementById('update-status-form');

        // Open modal when clicking 'Update Status' button
        document.querySelectorAll('.open-status-modal').forEach(button => {
            button.addEventListener('click', function() {
                const applicationId = this.dataset.applicationId;
                const currentStatus = this.dataset.currentStatus;

                // Populate modal form with application data
                document.getElementById('application-id').value = applicationId;
                document.getElementById('status').value = currentStatus;

                // Show the modal
                modal.classList.remove('hidden');
            });
        });

        // Close modal when clicking 'Cancel'
        closeModalBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Handle form submission via AJAX
        updateStatusForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const applicationId = document.getElementById('application-id').value;
            const newStatus = document.getElementById('status').value;

            fetch("{{ route('updateApplicationStatus') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    application_id: applicationId,
                    status: newStatus
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();  // Reload the page to reflect changes
                } else {
                    alert('Error updating status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

            // Hide the modal
            modal.classList.add('hidden');
        });
    });
</script>
@endsection
