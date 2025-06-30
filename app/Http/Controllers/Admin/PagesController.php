<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Module;
use App\Models\Institution;
use Illuminate\Http\Request;
use App\Models\TrainingProgram;
use App\Models\ProgramApplicant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\TrainingProgramApplication;

class PagesController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $data = [];

        if ($user->role === 'admin') {
            $data['totalInstitutions'] = Institution::count();
            $data['newInstitutionsThisMonth'] = Institution::whereMonth('created_at', Carbon::now()->month)->count();
            $data['totalApplications'] = ProgramApplicant::count();
            $data['newApplicationsThisMonth'] = ProgramApplicant::whereMonth('created_at', Carbon::now()->month)->count();
        } elseif ($user->role === 'institution') {
            $institutionId = $user->institution->id ?? null;
            if ($institutionId) {
                $data['totalTrainingPrograms'] = TrainingProgram::where('institution_id', $institutionId)->count();
                $data['newTrainingProgramsThisMonth'] = TrainingProgram::where('institution_id', $institutionId)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->count();
                $data['totalApplications'] = ProgramApplicant::where('institution_id', $institutionId)->count();
                $data['newApplicationsThisMonth'] = ProgramApplicant::where('institution_id', $institutionId)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->count();
            } else {
                // Handle case where institution user doesn't have an associated institution
                $data['error'] = 'No institution associated with this account.';
            }
        }

        return view('backend.dashboard', $data);
    }

    public function getTrainingPrograms()
    {
        // Check if the logged-in user has institution data
        if (is_null(Auth::user()->institution)) {
            // Redirect to the profile page if institution data is missing
            return redirect()->route('getProfile', auth()->user()->id)->with('error', 'Please complete your institution data.');
        }

        $institutionId = Auth::user()->institution->id;
        $trainingPrograms = TrainingProgram::where('institution_id', $institutionId)
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.trainingPrograms.index', compact('trainingPrograms'));
    }

    public function generateTrainingProgramReport()
    {
        $institutionId = auth()->user()->institution->id;
        $trainingPrograms = TrainingProgram::where('institution_id', $institutionId)
            ->orderBy('id', 'desc')
            ->get();

        $pdf = PDF::loadView('backend.reports.trainingPrograms', compact('trainingPrograms'));

        return $pdf->download('training_programs_report.pdf');
    }

    public function createTrainingProgram()
    {
        // Check if the logged-in user has institution data
        if (is_null(Auth::user()->institution)) {
            // Redirect to the profile page if institution data is missing
            return redirect()->route('getProfile', auth()->user()->id)->with('error', 'Please complete your institution data.');
        }

        return view('backend.trainingPrograms.create');
    }

    public function storeTrainingProgram(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'source_of_competency' => 'nullable|string|max:255',
            'module_duration' => 'nullable|integer|min:0',
            'number_of_trainees' => 'nullable|integer|min:0',
            'training_duration' => 'nullable|integer|min:0',
            'entry_requirements' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Image validation
            'modules.*.module_name' => 'required|string|max:255',
            'modules.*.module_duration' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('training_images', 'public'); // Save image
        }

        // Create the training program
        $trainingProgram = TrainingProgram::create([
            'institution_id' => Auth::user()->institution->id,
            'name' => $validatedData['name'],
            'source_of_competency' => $validatedData['source_of_competency'],
            'module_duration' => $validatedData['module_duration'],
            'number_of_trainees' => $validatedData['number_of_trainees'],
            'training_duration' => $validatedData['training_duration'],
            'entry_requirements' => $validatedData['entry_requirements'],
            'description' => $validatedData['description'],
            'image' => $imagePath ?? null,
        ]);

        // Store modules
        foreach ($request->modules as $module) {
            $trainingProgram->modules()->create([
                'module_name' => $module['module_name'],
                'module_duration' => $module['module_duration'],
            ]);
        }

        return redirect()->route('getTrainingPrograms')->with('success', 'Training program created successfully.');
    }

    public function editTrainingProgram($id)
    {
        $trainingProgram = TrainingProgram::findOrFail($id);

        // $this->authorize('update', $trainingProgram);

        return view('backend.trainingPrograms.edit', compact('trainingProgram'));
    }

    public function updateTrainingProgram(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'source_of_competency' => 'nullable|string|max:255',
            'module_duration' => 'nullable|numeric',
            'number_of_trainees' => 'nullable|numeric',
            'training_duration' => 'nullable|numeric',
            'entry_requirements' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'modules.*.module_name' => 'nullable|string|max:255',
            'modules.*.module_duration' => 'nullable|numeric',
        ]);

        // Retrieve the training program to update
        $trainingProgram = TrainingProgram::findOrFail($id);

        // Update the basic fields
        $trainingProgram->name = $request->input('name');
        $trainingProgram->source_of_competency = $request->input('source_of_competency');
        $trainingProgram->module_duration = $request->input('module_duration');
        $trainingProgram->number_of_trainees = $request->input('number_of_trainees');
        $trainingProgram->training_duration = $request->input('training_duration');
        $trainingProgram->entry_requirements = $request->input('entry_requirements');
        $trainingProgram->description = $request->input('description');

        // Handle image upload if present
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($trainingProgram->image && Storage::exists('public/' . $trainingProgram->image)) {
                Storage::delete('public/' . $trainingProgram->image);
            }

            // Store the new image and save the path
            $path = $request->file('image')->store('program_images', 'public');
            $trainingProgram->image = $path;
        }

        // Save the updated training program
        $trainingProgram->save();

        // Update the program modules
        // First, delete existing modules
        $trainingProgram->modules()->delete();

        // Then recreate modules from the request
        if ($request->has('modules')) {
            foreach ($request->input('modules') as $moduleData) {
                if (!empty($moduleData['module_name'])) {
                    $module = new Module();
                    $module->training_program_id = $trainingProgram->id;
                    $module->module_name = $moduleData['module_name'];
                    $module->module_duration = $moduleData['module_duration'] ?? null;
                    $module->save();
                }
            }
        }

        // Redirect back with success message
        return redirect()->route('getTrainingPrograms')->with('success', 'Training Program updated successfully.');
    }

    public function deleteTrainingProgram($id)
    {
        $trainingProgram = TrainingProgram::findOrFail($id);

        $trainingProgram->delete();

        return redirect()->route('getTrainingPrograms')
                        ->with('success', 'Training program deleted successfully!');
    }

    public function sendApplication(Request $request, $programId)
    {
        // Create a new application for the given training program
        $application = new TrainingProgramApplication();
        $application->training_program_id = $programId;
        $application->user_id = auth()->id();
        $application->status = 'pending';
        $application->save();

        // Update the status of the training program to 'pending'
        $trainingProgram = TrainingProgram::findOrFail($programId);
        $trainingProgram->status = 'pending';
        $trainingProgram->save();

        return redirect()->back()->with('success', 'Application sent successfully and program status updated to pending.');
    }

    public function updateApplicationStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'application_id' => 'required|exists:program_applicants,id',
            'status' => 'required|in:Pending,Rejected,Approved'
        ]);

        // Find the application by ID
        $application = ProgramApplicant::find($request->application_id);

        // Update the status
        $application->status = $request->status;
        $application->save();

        // Return a JSON response
        return response()->json(['success' => true]);
    }

    public function getApplications()
    {
        $institutionId = Auth::user()->institution->id;
        $applications = ProgramApplicant::where('institution_id', $institutionId)
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.getApplications', compact('applications'));
    }

    public function generateProgramApplicationsReport()
    {
        $institutionId = Auth::user()->institution->id;
        $applications = ProgramApplicant::with('trainee', 'trainingProgram')
            ->where('institution_id', $institutionId)
            ->orderBy('id', 'desc')
            ->get();

        $pdf = PDF::loadView('backend.reports.programApplications', compact('applications'));

        return $pdf->download('program_applications_report.pdf');
    }

    public function getProfile($id)
    {
        $user = User::with('institution')->findOrFail($id);
        $institution = $user->institution ?? new Institution();

        return view('backend.profile', compact('user', 'institution'));
    }

    // Update institution profile
    public function updateInstitutionProfile(Request $request, $id)
    {
        // Find the user and their associated institution profile
        $user = User::findOrFail($id);
        $institution = $user->institution;

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // If no institution profile exists, create one
        if (!$institution) {
            $institution = Institution::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'type' => $request->type,
                'physical_address' => $request->physical_address,
                'province' => $request->province,
                'district' => $request->district,
                'sector' => $request->sector,
                'cell' => $request->cell,
                'village' => $request->village,
                'phone' => $request->phone,
                'email' => $request->email,
                'owner_name' => $request->owner_name,
                'owner_phone' => $request->owner_phone,
                'owner_email' => $request->owner_email,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone' => $request->contact_person_phone,
                'contact_person_email' => $request->contact_person_email,
                'registration_date' => $request->registration_date,
                'registration_number' => $request->registration_number,
            ]);
        } else {
            // Update institution details
            $institution->update([
                'name' => $request->name,
                'type' => $request->type,
                'physical_address' => $request->physical_address,
                'province' => $request->province,
                'district' => $request->district,
                'sector' => $request->sector,
                'cell' => $request->cell,
                'village' => $request->village,
                'phone' => $request->phone,
                'email' => $request->email,
                'owner_name' => $request->owner_name,
                'owner_phone' => $request->owner_phone,
                'owner_email' => $request->owner_email,
                'contact_person_name' => $request->contact_person_name,
                'contact_person_phone' => $request->contact_person_phone,
                'contact_person_email' => $request->contact_person_email,
                'registration_date' => $request->registration_date,
                'registration_number' => $request->registration_number,
            ]);
        }

        // Redirect with a success message
        return redirect()->route('dashboard', $id)->with('success', 'Institution profile updated successfully.');
    }
}
