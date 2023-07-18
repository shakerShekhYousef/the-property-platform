<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'Super Admin',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'name'=>'Admin',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('roles')->insert([
            'name'=>'Agent',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>Hash::make('012345'),
            'role_id'=>1,
            'language'=>'English',
            'image'=>'2.jpg',
            'phone_number'=>'+971093727',


        ]);
    }
}
