<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'admin']);

        Permission::create(['name' => 'read employee']);
        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'update employee']);
        Permission::create(['name' => 'delete employee']);

        Permission::create(['name' => 'read department']);
        Permission::create(['name' => 'create department']);
        Permission::create(['name' => 'update department']);
        Permission::create(['name' => 'delete department']);

        Permission::create(['name' => 'read position']);
        Permission::create(['name' => 'create position']);
        Permission::create(['name' => 'update position']);
        Permission::create(['name' => 'delete position']);

        Permission::create(['name' => 'read group']);
        Permission::create(['name' => 'create group']);
        Permission::create(['name' => 'update group']);
        Permission::create(['name' => 'delete group']);

        Permission::create(['name' => 'read attendance']);
        Permission::create(['name' => 'create attendance']);
        Permission::create(['name' => 'update attendance']);
        Permission::create(['name' => 'delete attendance']);

        Permission::create(['name' => 'read salary']);
        Permission::create(['name' => 'create salary']);
        Permission::create(['name' => 'update salary']);
        Permission::create(['name' => 'delete salary']);

        Permission::create(['name' => 'read complain']);
        Permission::create(['name' => 'create complain']);
        Permission::create(['name' => 'update complain']);
        Permission::create(['name' => 'delete complain']);

        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        // create roles and assign existing permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('admin');

        $employee = Role::create(['name' => 'employee']);
        $employee->givePermissionTo('read attendance');
        $employee->givePermissionTo('read salary');
        $employee->givePermissionTo('read complain');
        $employee->givePermissionTo('create complain');

        $director = Role::create(['name' => 'director']);
        $director->givePermissionTo('read attendance');
        $director->givePermissionTo('read salary');
        $director->givePermissionTo('read complain');
        $director->givePermissionTo('create complain');

        $hrd = Role::create(['name' => 'hrd']);
        $hrd->givePermissionTo('create employee');
        $hrd->givePermissionTo('read employee');
        $hrd->givePermissionTo('update employee');
        $hrd->givePermissionTo('delete employee');

        $hrd->givePermissionTo('create position');
        $hrd->givePermissionTo('read position');
        $hrd->givePermissionTo('update position');
        $hrd->givePermissionTo('delete position');

        $finance = Role::create(['name' => 'finance']);
        $finance->givePermissionTo('create salary');
        $finance->givePermissionTo('read salary');
        $finance->givePermissionTo('update salary');
        $finance->givePermissionTo('delete salary');
    }
}
