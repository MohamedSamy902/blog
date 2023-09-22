<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            'role',
            'add-role',
            'edit-role',
            'delete-role',

            'user',
            'add-user',
            'edit-user',
            'delete-user',

            'categor-list',
            'add-category',
            'edit-category',
            'delete-category',


        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
