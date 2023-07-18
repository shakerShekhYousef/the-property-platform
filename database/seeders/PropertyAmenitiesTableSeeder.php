<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyAmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_amenities')->insert([
            'name'=>'Private Swimming pool',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Community swimming pool',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Beach',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Spa',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Concierge services',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Security Services',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Pets allowed',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Community club',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Kids playground area',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Private Gym',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Community Gym',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Private Jacuzzi ',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Community Jacuzzi',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Parking',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Basketball course',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Golf course',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Tennis course',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Football Pitch',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Balcony',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Built-in kitchen appliances',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Built-in wardbose',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Central A/C and Heating',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Maid Service',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Maids Room',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Private Garden',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'View of Landmark',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'View of Water',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('property_amenities')->insert([
            'name'=>'Walk-in Closet',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
