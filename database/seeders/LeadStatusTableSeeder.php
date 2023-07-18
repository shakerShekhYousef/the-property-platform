<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lead_statuses')->insert([
            'name'=>'On Hold',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Pending',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Interested',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Not Interested',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Not Answered',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Number & Email Unavailable',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Mobile Switched off',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Wrong Number & Email',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Line Busy',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Invalid Number & Email',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Appointment is Set',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Contacted Via Email',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Paid',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Cancelation after appointment',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('lead_statuses')->insert([
            'name'=>'Others',
            'type_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
