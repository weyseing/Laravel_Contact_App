<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// ===============================
// MUST import model
// ===============================
use App\Models\Company;                     //Company model
use App\Models\Contact;                    //contact model

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->hasContacts(5)->count(10)->create();                     
    }
}
