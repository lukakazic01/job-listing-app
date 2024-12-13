<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    //

    public function jobPosters() {
        return $this->hasMany(JobPoster::class);
    }
}
