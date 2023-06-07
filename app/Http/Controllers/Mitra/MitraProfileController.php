<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mitra\ProfileRequest;
use App\Models\MitraProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MitraProfileController extends Controller
{
    public function edit(MitraProfile $profile){
        return view('mitra.profil.edit', ['profile' => $profile->first()]);
    }

    public function update(ProfileRequest $request, MitraProfile $profile)
    {
        $data = $request->validated();
        if($request->hasFile('logo')){
            Storage::delete('public/'.$profile->first()->logo);
            $data['logo'] = $request->logo->store('logo', 'public');
        }
        $profile->first()->update($data);
        Alert::success('Berhasil', 'Mengupdate profile');
        return redirect()->route('mitra.program.create');
    }
}
