<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TrainingProgram;
use App\Http\Controllers\Controller;
use App\Models\TrainingProgramApplication;
use PDF;

class AdminController extends Controller
{
    public function trainingRequests()
    {
        $requests = TrainingProgramApplication::with('trainingProgram', 'user')->orderBy('created_at', 'desc')->get();

        return view('backend.getProgramApplications.index', compact('requests'));
    }

    public function generateReport()
    {
        // Get all the applications to include in the report
        $applications = TrainingProgramApplication::with('trainingProgram.institution', 'user')->get();

        // Load the view and pass the applications data
        $pdf = PDF::loadView('backend.reports.training_program_applications', compact('applications'));

        // Download the PDF with a filename
        return $pdf->download('training_program_applications_report.pdf');
    }

    // Approve Application
    public function approveApplication(Request $request, $applicationId)
    {
        // Find the application
        $application = TrainingProgramApplication::findOrFail($applicationId);

        // Update the application status to 'approved'
        $application->status = 'approved';
        $application->reason = $request->reason;
        $application->save();

        // Update the related training program's status to 'approved'
        $trainingProgram = TrainingProgram::findOrFail($application->training_program_id);
        $trainingProgram->status = 'approved';
        $trainingProgram->save();

        return redirect()->back()->with('success', 'Application approved successfully, and training program status updated.');
    }

    // Reject Application
    public function rejectApplication(Request $request, $applicationId)
    {
        // Find the application
        $application = TrainingProgramApplication::findOrFail($applicationId);

        // Update the application status to 'rejected'
        $application->status = 'rejected';
        $application->reason = $request->reason;
        $application->save();

        // Update the related training program's status to 'rejected'
        $trainingProgram = TrainingProgram::findOrFail($application->training_program_id);
        $trainingProgram->status = 'rejected';
        $trainingProgram->save();

        return redirect()->back()->with('success', 'Application rejected successfully, and training program status updated.');
    }

    public function trainingRequestDetails($id)
    {
        $request = TrainingProgramApplication::findOrFail($id);

        return view('backend.getProgramApplications.show', compact('request'));
    }
}
