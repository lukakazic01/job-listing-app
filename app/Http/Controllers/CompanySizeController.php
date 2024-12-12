<?php

namespace App\Http\Controllers;

use App\Models\CompanySize;

class CompanySizeController extends Controller
{
    public function __invoke() {
        return CompanySize::all()->map(fn($companySize) => ['value' => $companySize->id, 'label' => $companySize->name]);
    }
}
