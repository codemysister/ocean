<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function sudahDaftar($user_profile_id, $program_id)
    {
        $result = Applicant::where('program_id', $program_id)
        ->where('user_profile_id', $user_profile_id)
        ->exists();
        return $result;
    }

    public function profileLengkap()
    {
        foreach ($this->attributes as $attribute) {
            if (empty($attribute)) {
                return false;
            }
        }

        return true;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class);
    }
}
