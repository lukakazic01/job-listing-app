<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    public function jobPosters()
    {
        return $this->hasMany(JobPoster::class);
    }
}
