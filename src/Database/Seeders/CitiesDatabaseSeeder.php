<?php

namespace ubitcorp\Cities\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class CitiesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
         
        DB::unprepared(file_get_contents(__DIR__.'/cities_seed.sql'));
    }
}
