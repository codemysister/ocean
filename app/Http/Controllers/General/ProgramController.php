<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
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
        return view('general.program', compact('user'));
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
