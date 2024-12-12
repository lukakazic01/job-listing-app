<?php

namespace App\Http\Middleware;

use App\Models\City;
use App\Models\CompanySize;
use App\Models\Industry;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            //TODO: Find a better way to do this
            'industries' => Industry::all()->map(fn ($industry) => ['value' => $industry->id, 'label' => $industry->name]),
            'cities' => City::all()->map(fn ($city) => ['value' => $city->id, 'label' => $city->name]),
            'companySizes' => CompanySize::all()->map(fn ($companySize) => ['value' => $companySize->id, 'label' => $companySize->size])
        ]);
    }
}
