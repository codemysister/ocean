<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
    * Handle the incoming request.
    */
    public function __invoke(Request $request)
    {
        $jmlMitra = User::has('profileMitra')->count();
        $jmlUser = User::has('profileUser')->count();
        $jmlProgram = Program::count();
        $programTerbaru = Program::with('mitra')->latest()->limit(10)->get();
        $programTerpopuler = Program::with('applicants', 'mitra')->withCount('applicants')->orderBy('applicants_count', 'desc')->limit(5)->get();

        return view('admin.dashboard.dashboard', compact('jmlMitra', 'jmlUser', 'jmlProgram', 'programTerbaru', 'programTerpopuler'));
    }
}
