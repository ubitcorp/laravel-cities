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
         
        if(env('DB_CONNECTION')=='pgsql')
            DB::unprepared(file_get_contents(__DIR__.'/cities_seed_pgsql.sql'));
        else
            DB::unprepared(file_get_contents(__DIR__.'/cities_seed.sql'));
    }
}
