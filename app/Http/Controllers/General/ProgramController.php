<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
    * Handle the incoming request.
    */
    public function index(Request $request)
    {
        $user = Auth::user();
        $programs = Program::with('mitra')->get();
        return view('general.program', compact('user', 'programs'));
    }

    public function show(Program $program)
    {
        return view('general.program_detail', compact('program'));
    }

    public function btnInfoProfile()
    {
        alert()->html('<p>Profil belum lengkap</p>',"
        Silahkan
        <a href=".route('mitra.profile.edit',Auth::user()->profileMitra->uuid)."><b><u>lengkapi profil</u></b></a>
         Anda terlebih dahulu
        ",'info')->autoClose(8000);

        return redirect()->back();
    }
}
