<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Student']);
        $role3 = Role::create(['name' => 'Teacher']);

        Permission::create(['name' => 'admin.dashboard'])->assignRole($role1);
        Permission::create(['name' => 'user.dashboard'])->assignRole([$role2,$role3]);

        Permission::create(['name' => 'user.laboratorios'])->assignRole($role3);
        
        
    }
}
