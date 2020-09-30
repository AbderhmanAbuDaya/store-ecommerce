<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *l
     * @return void
     */
    public function run()
    {
   factory(\App\Models\Product::class,22)->create([

   ]);

    }


}
