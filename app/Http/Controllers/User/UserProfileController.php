<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    public function edit(UserProfile $profile)
    {
        return view('user.profil.edit', compact('profile'));
    }

    public function update(ProfileRequest $request, UserProfile $profile)
    {
        $data = $request->validated();
        if($request->hasFile('profile_image')){
            if($profile->profile_image != "profile_default.jpg"){
                Storage::delete('public/'.$profile->profile_image);
            }
            $data['profile_image'] = $request->profile_image->store('profile_image', 'public');
        }
        $profile->update($data);
        Alert::success('Berhasil', 'Mengupdate profile');
        return redirect()->route('program');
    }
}
