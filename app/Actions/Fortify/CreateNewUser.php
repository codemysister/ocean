<?php

namespace App\Actions\Fortify;

use App\Models\Mitra;
use App\Models\MitraProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): Model
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        if($input['role'] == 'mitra'){
            $mitra = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            MitraProfile::create([
                'user_id' => $mitra->id,
                'uuid' => Str::uuid()
            ]);

            return $mitra->assignRole('Mitra');

        }else{


            $user =  User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            UserProfile::create([
                'user_id' => $user->id,
                'profile_image' => 'profile_default.jpg',
                'uuid' => Str::uuid()
            ]);

            return $user->assignRole('User');
        }
    }
}
