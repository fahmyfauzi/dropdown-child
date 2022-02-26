<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndonesiaCity extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->hasMany(IndonesiaDistrict::class, 'city_code', 'code');
    }
}
