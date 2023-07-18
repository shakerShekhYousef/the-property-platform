<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lead_types')->insert([
            'name'=>'On Hold',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_types')->insert([
            'name'=>'Pending',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_types')->insert([
            'name'=>'Qualified',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_types')->insert([
            'name'=>'Follow Up',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_types')->insert([
            'name'=>'Won',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_types')->insert([
            'name'=>'Dead',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

    }
}
