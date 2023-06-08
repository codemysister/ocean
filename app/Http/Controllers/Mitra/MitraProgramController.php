<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\ProgramRequest;
use App\Models\Category;
use App\Models\Program;
use App\Services\Mitra\ProgramService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MitraProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::with('mitra')->where('mitra_profiles_id', Auth::user()->profileMitra->id)->get();
        return view('mitra.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->pluck('id', 'category_name');
        return view('mitra.program.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequest $request, ProgramService $programService)
    {
        $programService->handleStore($request);
        Alert::success('Berhasil', 'Menambah program');
        return redirect()->route('mitra.program.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $title = 'Hapus Program!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        return view('mitra.program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $categories = Category::all()->pluck('id', 'category_name');
        return view('mitra.program.edit', compact('program', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramRequest $request, Program $program, ProgramService $programService)
    {
        $programService->handleUpdate($request, $program);
        Alert::success('Berhasil', 'Mengupdate program');
        return redirect()->route('mitra.program.show', $program->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program, ProgramService $programService)
    {
        $programService->handleDestroy($program);
        Alert::success('Berhasil', 'Menghapus program');
        return redirect()->route('mitra.program.index');
    }
}
