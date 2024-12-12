<?php

namespace App\Http\Controllers;

use App\Models\CompanySize;
use Illuminate\Http\Request;

class CompanySizeController extends Controller
{
    public function __construct() {
        return CompanySize::all()->map(fn($companySize) => ['value' => $companySize->id, 'label' => $companySize->name]);
    }
}
