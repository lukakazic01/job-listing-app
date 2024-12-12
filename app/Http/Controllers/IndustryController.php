<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function __invoke(Request $request)
    {
        return Industry::all()->map(fn ($item) => ["value" => $item->id, "label" => $item->name]);
    }
}
