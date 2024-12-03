<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPoster extends Model
{
    use HasUuids, HasFactory;

    public function user() {
        return $this->morphOne(User::class, 'profilable');
    }
}
