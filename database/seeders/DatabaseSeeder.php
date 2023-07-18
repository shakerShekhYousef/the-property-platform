<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FurnitureTypeTableSeeder::class);
        $this->call(GuestTypeTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(LeadSourceTableSeeder::class);
        $this->call(LeadTypeTableSeeder::class);
        $this->call(LeadStatusTableSeeder::class);
        $this->call(PetTypeTableSeeder::class);
        $this->call(PropertyAmenitiesTableSeeder::class);
        $this->call(PropertyCategoryTableSeeder::class);
        $this->call(PropertyStatusTableSeeder::class);
        $this->call(PropertyTypeTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(MaintenanceCategoryTableSeeder::class);
        $this->call(MaintenanceRequestStatusTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(PaymentFrequencyTableSeeder::class);
        $this->call(LeadProjectTableSeeder::class);

        
    }
}
