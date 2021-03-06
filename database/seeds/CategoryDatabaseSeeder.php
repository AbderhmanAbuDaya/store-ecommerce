<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *l
     * @return void
     */
    public function run()
    {
   factory(Category::class,22)->create([
       "parent_id"=>$this->getRandomParentId()
   ]);

    }

    private function getRandomParentId()
    {
     $category=   Category::inRandomOrder()->first();
        return  $category;
    }
}
