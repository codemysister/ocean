<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Program;
use App\Models\Slider;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sliders = Slider::where('status', 1)->get();
        $categories = Category::limit(5)->get();
        $programs = Program::all();
        return view('general.landing', compact('sliders', 'categories', 'programs'));
    }
}
