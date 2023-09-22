<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionTableSeeder::class);


        $user = \App\Models\User::create([
            'name' => 'Mohamed Samy',
            'username' => 'mohamed',
            'password' => bcrypt('123123'),
            'mobile' => 01150100104,
            'role_name' => 'admin',
            'email' => 'admin@app.com',
        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
