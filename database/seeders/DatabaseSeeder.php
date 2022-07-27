<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Permission::create(['name'=>'Pregled']);
      

      $adminRole = Role::create(['name'=>'Admin']);
      $userRole  = Role::create(['name'=>'User']);

      $adminRole->givePermissionTo([
        'Pregled'
      ]);
    
      
    }
}
