<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserApplicantController extends Controller
{
    public function apply(Request $request)
    {
        $data = $request->validate([
            'program_id' => 'required',
            'cv' => 'required',
        ]);

        $data['user_profile_id'] = Auth::user()->profileUser->id;
        $data['status'] = "Terdaftar";
        $data['cv'] = $request->cv->store('cv', 'public');

        Applicant::create($data);
        Alert::success('Berhasil', 'Mendaftar program');
        return redirect()->route('program');
    }
}
