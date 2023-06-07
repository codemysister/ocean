<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MitraProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'uuid';
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
}
