<?php

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
       // $this->call(SettingDatabaseSeeder::class);
        factory(\App\Models\Brand::class,40)->create();
        factory(\App\Models\Product::class,500)->create();
    }
}
