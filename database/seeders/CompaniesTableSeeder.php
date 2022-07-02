<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// =================================
// MUST import
// =================================
use App\Models\Company;             //Contact model

// ********************
// must add this
// ********************
use Illuminate\Support\Facades\DB;  

use Faker\Factory as Faker; //faker library to create seeder data

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(10)->create();                     //created Factory fake model instance and save MULTIPLE faker data to DB
    }
}
