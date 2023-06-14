<?php

namespace App\Services\Admin;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class SliderService
{
    public function handleStore($request)
    {
        $data = $request->validated();
        $data['uuid'] = Str::uuid();
        $data['img'] = $request->img->store('slider', 'public');
        Slider::create($data);
        return true;
    }

    public function handleUpdate($request, $slider)
    {
        $data = $request->validated();
        if($request->hasFile('img')){
            Storage::delete('public/'.$slider->img);
            $data['img'] = $request->img->store('slider', 'public');
        }
        $slider->update($data);
        return true;
    }

    public function handleDestroy($slider){
        Storage::delete('public/'.$slider->img);
        $slider->delete();
        return true;
    }
}
