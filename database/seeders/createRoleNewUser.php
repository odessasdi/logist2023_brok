<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class createRoleNewUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   
       
        Role::create(['name' => "new-user", "guard_name" => "web"]);
        
    }
}
