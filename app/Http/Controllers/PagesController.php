<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Models\TrainingProgram;
use App\Models\ProgramApplicant;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        $trainingPrograms = TrainingProgram::where('status', 'approved')->orderBy('id', 'desc')->get();

        return view('frontend.index', compact('trainingPrograms'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function getTrades()
    {
        $trainingPrograms = TrainingProgram::where('status', 'approved')
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.trades.index', compact('trainingPrograms'));
    }

    public function getTradeDetails($id)
    {
        $program = TrainingProgram::where('status', 'approved')->findOrFail($id);

        return view('frontend.trades.show', compact('program'));
    }

    public function apply(Request $request, $programId)
    {
        // Get the logged-in user
        $user = Auth::user();

        // Check if the user has a corresponding trainee record
        $trainee = Trainee::where('user_id', $user->id)->first();

        // If no trainee record exists, redirect to the profile edit page
        if (!$trainee) {
            return redirect()->route('editTraineeProfile', $user->id)
                ->with('error', 'Please complete your trainee profile before applying.');
        }

        // Find the training program by ID
        $program = TrainingProgram::findOrFail($programId);

        // Check if the user has already applied for this program
        $existingApplication = ProgramApplicant::where('trainee_id', $trainee->id)
            ->where('training_program_id', $program->id)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this program.');
        }

        // Create the application
        ProgramApplicant::create([
            'trainee_id' => $trainee->id,
            'training_program_id' => $program->id,
            'institution_id' => $program->institution_id,
            'application_date' => now(),
            'status' => 'Pending',
        ]);

        return redirect()->back()->with('success', 'You have successfully applied for this program.');
    }

    public function getTraineeProfile($id)
    {
        $user = User::with('trainee')->findOrFail($id);

        $trainee = $user->trainee ?? new Trainee();

        $applications = $trainee->exists ? $trainee->programApplicants : collect();

        return view('frontend.profile.index', compact('user', 'trainee', 'applications'));
    }

    public function editTraineeProfile($id)
    {
        $user = User::with('trainee')->findOrFail($id);

        $trainee = $user->trainee ?? new Trainee();

        return view('frontend.profile.edit', compact('user', 'trainee'));
    }

    public function updateTraineeProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $trainee = $user->trainee;

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // If no trainee profile exists, create one
        if (!$trainee) {
            $trainee = Trainee::create([
                'user_id' => $user->id,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'phone' => $request->phone,
                'education_level' => $request->education_level,
            ]);
        } else {
            // Update trainee details
            $trainee->update([
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'phone' => $request->phone,
                'education_level' => $request->education_level,
            ]);
        }

        return redirect()->route('getTraineeProfile', $id)->with('success', 'Profile updated successfully.');
    }
}
