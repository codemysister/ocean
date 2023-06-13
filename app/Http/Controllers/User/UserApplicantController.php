<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantSubmission;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
class UserApplicantController extends Controller
{

    public function index()
    {
        $applicants = Applicant::with('program', 'userProfile')->where('user_profile_id', Auth::user()->profileUser->id)->paginate(10);
        return view('user.applicant.index', compact('applicants'));
    }

    public function apply(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'required',
            'cv' => 'required',
        ]);

        $data['uuid'] = Str::uuid();
        $data['user_profile_id'] = Auth::user()->profileUser->id;
        $data['status'] = "Terdaftar";
        $data['cv'] = $request->cv->store('cv', 'public');

        Applicant::create($data);
        Alert::success('Berhasil', 'Mendaftar program');
        return redirect()->route('program');
    }

    public function show(Program $program)
    {
        return view('user.applicant.show', compact('program'));
    }

    public function status(Program $program)
    {
        $applicant = $program->applicants()->where('user_profile_id', Auth::user()->profileUser->id)->first();
        return view('user.applicant.status', compact('program', 'applicant'));
    }

    public function submitSubmission(Program $program, Request $request, Applicant $applicant)
    {
        $submission = 'storage/'.$request->submission->store('applicant/submission', 'public');
        ApplicantSubmission::create([
            'program_id' => $program->id,
            'applicant_id' => $applicant->id,
            'submission' => $submission
        ]);
        Alert::success('Berhasil', 'Mengumpulkan tes');
        return redirect()->route('user.applicant.status', $program->slug);
    }

    public function confirmationInterview(Request $request, Program $program, Applicant $applicant)
    {
        $applicant->interview->update(['confirmation' => $request->confirmation]);
        Alert::success('Berhasil', 'Konfirmasi interview');
        return redirect()->route('user.applicant.status', $program->slug);
    }

}
