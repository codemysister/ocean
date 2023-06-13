<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\SubmissionRequest;
use App\Models\Applicant;
use App\Models\ApplicantInterview;
use App\Models\Program;
use App\Models\ProgramPassInformation;
use App\Models\ProgramSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MitraApplicantController extends Controller
{
    public function applicant(Program $program, Request $request)
    {
        $title = 'Hapus Program!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $applicants = Applicant::with('userProfile', 'program')->where('status', 'Terdaftar')->where('program_id', $program->id)->paginate(10);
        return view('mitra.program.applicant', compact('program', 'applicants'));
    }

    public function selection(Program $program, Applicant $applicant)
    {
        $title = 'Hapus Program!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $applicants = Applicant::with('userProfile', 'program')->where('status', 'Seleksi')->where('program_id', $program->id)->paginate(10);
        return view('mitra.program.applicant_selection', compact('program', 'applicants'));
    }

    public function interview(Program $program)
    {
        $title = 'Hapus Program!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $applicants = Applicant::with('userProfile', 'program')->where('status', 'Interview')->where('program_id', $program->id)->paginate(10);
        return view('mitra.program.applicant_interview', compact('program', 'applicants'));
    }

    public function pass(Program $program)
    {
        $title = 'Hapus Program!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $applicants = Applicant::with('userProfile', 'program')->where('status', 'Lolos')->where('program_id', $program->id)->paginate(10);
        return view('mitra.program.applicant_passed', compact('program', 'applicants'));
    }

    public function submission(SubmissionRequest $request, Program $program)
    {
        $data = $request->validated();
        $data['submission'] = $request->submission->store('submission', 'public');
        $data['program_id'] = $program->id;
        ProgramSubmission::create($data);
        Alert::success('Berhasil', 'Menambah tes ke peserta terleksi');
        return redirect()->route('mitra.program.applicant.selection', $program->slug);
    }

    public function updateSubmission(SubmissionRequest $request, Program $program, ProgramSubmission $submission)
    {
        $data = $request->validated();
        if($request->hasFile('submission')){
            Storage::delete('public/'.$program->submission);
            $data['submission'] = $request->submission->store('submission', 'public');
        }
        $data['program_id'] = $program->id;
        $submission->update($data);
        Alert::success('Berhasil', 'Mengupdate tes ke peserta terleksi');
        return redirect()->route('mitra.program.applicant.selection', $program->slug);
    }

    public function deleteSubmission(Program $program, ProgramSubmission $submission)
    {

        $submission->delete();
        Alert::success('Berhasil', 'Menghapus tes');
        return redirect()->route('mitra.program.applicant.selection', $program->slug);
    }

    public function select(Program $program, Applicant $applicant)
    {
        $applicant->update(['status' => 'Seleksi']);
        Alert::success('Berhasil', 'Menambah peserta ke proses seleksi');
        return redirect()->route('mitra.program.applicant', ['program' => $program->slug, 'applicant' => $applicant->uuid]);
    }

    public function passApplicant(Program $program, Applicant $applicant)
    {
        $applicant->update(['status' => 'Lolos']);
        Alert::success('Berhasil', 'Menambah peserta ke lolos seleksi');
        return redirect()->route('mitra.program.applicant.pass', ['program' => $program->slug, 'applicant' => $applicant->uuid]);
    }

    public function setInterview(Program $program, Applicant $applicant)
    {
        $applicant->update(['status' => 'Interview']);
        Alert::success('Berhasil', 'Menambah peserta ke proses interview');
        return redirect()->route('mitra.program.applicant.interview', ['program' => $program->slug, 'applicant' => $applicant->uuid]);
    }

    public function invite(Request $request, Program $program)
    {

        ApplicantInterview::create([
            'program_id' => $program->id,
            'applicant_id' => $request->applicant_id,
            'description' => $request->description,
            'interview_date' => $request->interview_date,
            'interview_start' => $request->interview_start,
            'interview_end' => $request->interview_end,
            'link' => $request->link
        ]);
        Alert::success('Berhasil', 'Mengundang peserta interview');
        return redirect()->route('mitra.program.applicant.interview', compact('program'));
    }

    public function reject(Program $program, Applicant $applicant)
    {
        $applicant->update(['status' => 'Tidak Lolos']);
        Alert::success('Berhasil', 'Menolak peserta');
        return redirect()->route('mitra.program.applicant', ['program' => $program->slug, 'applicant' => $applicant->uuid]);
    }

    public function submitInformation(Request $request, Program $program){
        ProgramPassInformation::create([
            'program_id' => $program->id,
            'information' => $request->information
        ]);
        Alert::success('Berhasil', 'Menambah informasi kelulusan');
        return redirect()->route('mitra.program.applicant.pass', compact('program'));
    }

    public function updateInformation(Request $request, Program $program, ProgramPassInformation $information){
        $information->update($request->all());
        Alert::success('Berhasil', 'Mengupdate informasi kelulusan');
        return redirect()->route('mitra.program.applicant.pass', compact('program'));
    }
}
