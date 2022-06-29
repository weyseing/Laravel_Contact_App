<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // delete all old records
        DB::table("companies")->truncate();    
        
        // create faker instance
        $faker = Faker::create();

        // create 10 seed data
        $companies = [];
        foreach (range(1, 10) as $index){
            $companies[]= [
                'name' => $faker->company,
                'address' => $faker->address,
                'website' => $faker->domainName,
                'email' => $faker->email,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // insert to DB
        DB::table("companies")->insert($companies);
    }
}
