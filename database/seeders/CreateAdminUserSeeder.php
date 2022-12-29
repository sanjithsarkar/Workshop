<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);

        $operator = User::create([
            'name'=>'Operator',
            'email'=>'operator@gmail.com',
            'password'=>bcrypt('12345678')
        ]);


        $admin_role = Role::create(['name' => 'admin']);
        $operator_role = Role::create(['name' => 'operator']);

        $permission = Permission::create(['name' => 'role-access']);
        $permission = Permission::create(['name' => 'role-edit']);
        $permission = Permission::create(['name' => 'role-create']);
        $permission = Permission::create(['name' => 'role-delete']);

        $permission = Permission::create(['name' => 'user-access']);
        $permission = Permission::create(['name' => 'user-edit']);
        $permission = Permission::create(['name' => 'user-create']);
        $permission = Permission::create(['name' => 'user-delete']);

        $permission = Permission::create(['name' => 'permission-access']);
        $permission = Permission::create(['name' => 'permission-edit']);
        $permission = Permission::create(['name' => 'permission-create']);
        $permission = Permission::create(['name' => 'permission-delete']);

        $admin->assignRole($admin_role);
        $operator->assignRole($operator_role);

        $admin_role->givePermissionTo(Permission::all());
    }
}
