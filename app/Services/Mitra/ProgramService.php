<?php

namespace App\Services\Mitra;

use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramService {

    public function handleStore($request) {
        $data = $request->validated();
        $data['guidebook'] = $request->guidebook->store('guidebook', 'public');
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(6);
        Program::create($data);
        return true;

    }

    public function handleUpdate($request, $program) {
        $data = $request->validated();

        if($request->hasFile('guidebook')){
            Storage::delete('public/'.$program->guidebook);
            $data['guidebook'] = $request->guidebook->store('guidebook', 'public');
        }

        $data['slug'] = Str::slug($request->title) . '-' . Str::random(6);

        $program->update($data);

        return true;
    }

    public function handleDestroy($program) {

        Storage::delete('public/'.$program->guidebook);
        $program->delete();

        return true;
    }
}
