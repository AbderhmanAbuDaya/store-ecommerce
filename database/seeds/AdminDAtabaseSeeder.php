<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminDAtabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        'name'=>'abderhman',
        'email'=>'admin@admin.com',
        'password'=>bcrypt("12345678")     
    

        ]);

        Admin::create([
            'name'=>'ahmed',
            'email'=>'admin2@admin.com',
            'password'=>bcrypt("12345678")     
        
    
            ]);
    }
}
