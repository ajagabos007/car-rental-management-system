<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::factory()->count(5)->create();

         /**
         * @var $roles
         */
        $roles = [
            'marketer',
            'customer care',
            'cleaner'
        ];
        
        foreach ($roles as $key => $role) {
            $new_role = Role::create(['name' =>$role]);
        }
    }
}
