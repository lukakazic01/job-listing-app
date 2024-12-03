<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $applicants = Applicant::factory(10)->create();
        foreach ($applicants as $applicant) {
            User::factory()->count(1)->state(function () use ($applicant) {
                return ['profilable_id' => $applicant->id];
            })->create();
        }
    }
}
