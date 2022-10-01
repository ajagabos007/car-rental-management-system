<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
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
        $permissions = [

            'create amenities',
            'view amenities',
            'edit amenities',
            'delete amenities',

            'create bookings',
            'view bookings',
            'edit bookings',
            'delete bookings',

            'create cars',
            'view cars',
            'edit cars',
            'delete cars',

            'create users',
            'view users',
            'edit users',
            'delete users',

            'create roles',
            'view roles',
            'edit roles',
            'delete roles',
        ];

        foreach ($permissions as $key => $permission) {
            $new_permission = Permission::create(['name' =>$permission]);
        }
    }
}
