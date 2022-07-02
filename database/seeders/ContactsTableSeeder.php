<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// ===============================
// MUST import model
// ===============================
use App\Models\Contact;                    //contact model

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::factory()->count(50)->create();                 //created Factory fake model instance and save MULTIPLE faker data to DB
    }
}
