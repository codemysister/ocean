<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use App\Services\Admin\SliderService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Slider!';
        $text = "Apakah anda yakin untuk menghapus?";
        confirmDelete($title, $text);
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request, SliderService $sliderService)
    {
        $sliderService->handleStore($request);
        Alert::success('Berhasil', 'Menambah slider');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider, SliderService $sliderService)
    {
        $sliderService->handleUpdate($request, $slider);
        Alert::success('Berhasil', 'Mengupdate slider');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider, SliderService $sliderService)
    {
        $sliderService->handleDestroy($slider);
        Alert::success('Berhasil', 'Menghapus slider');
        return redirect()->route('admin.slider.index');
    }
}
