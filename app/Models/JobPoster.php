<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPoster extends Model
{
    use HasUuids, HasFactory;

    protected $guarded = [];
    public function user() {
        return $this->morphOne(User::class, 'profilable');
    }

    public function industry() {
        return $this->hasOne(Industry::class, 'id', 'industry_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function companySize() {
        return $this->hasOne(CompanySize::class, 'id', 'company_size_id');
    }
}
