<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function mitra()
    {
        return $this->belongsTo(MitraProfile::class, 'mitra_profiles_id', 'id');
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    public function submission()
    {
        return $this->hasOne(ProgramSubmission::class);
    }

    public function information()
    {
        return $this->hasOne(ProgramPassInformation::class);
    }
}
