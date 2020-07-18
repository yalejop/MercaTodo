<?php

use App\Permission\Model\Permission;
use App\Permission\Model\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncade tables
        DB::statement("SET foreign_key_checks=0");
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        //user admin
        $userAdmin = User::where('email', 'admin@admin.com')->first();
        if ($userAdmin) {
            $userAdmin->delete();
        }

        $userAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'isAdmin' => true,
            'isEnable' => true
        ]);

        //Role Admin
        $roleAdmin = Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Adminitrator',
        'full-access' => 'yes'
        ]);

        //Role Registered User
       $roleUser = Role::create([
            'name' => 'Registered User',
            'slug' => 'registereduser',
            'description' => 'Registered User',
            'full-access' => 'no'
        ]); 

        //table role_user
        $userAdmin->roles()->sync([$roleAdmin->id]);

        //permission
        $permission_all = [];

       //permission role
       $permission = Permission::create([
        'name' => 'List Role',
        'slug' => 'role.index',
        'description' => 'A User can list Role',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show Role',
            'slug' => 'role.show',
            'description' => 'A User can see Role',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create Role',
            'slug' => 'role.create',
            'description' => 'A User can create Role',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit Role',
            'slug' => 'role.edit',
            'description' => 'A User can edit Role',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy Role',
            'slug' => 'role.destroy',
            'description' => 'A User can destroy Role',
        ]);

        $permission_all[] = $permission->id;

        //table role_permission
        $roleAdmin->permissions()->sync($permission_all);

        //permission user
        $permission = Permission::create([
        'name' => 'List user',
        'slug' => 'user.index',
        'description' => 'A User can list user',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'A User can see user',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'A User can edit user',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'A User can destroy user',
        ]);

        $permission_all[] = $permission->id;

        //New

        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'A User can see own user',
        ]);

        $permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'A User can edit own user',
        ]);

        $permission_all[] = $permission->id;

        /*  $permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'A User can create user',
        ]);

        $permission_all[] = $permission->id; */

         //table role_permission
         //$roleAdmin->permissions()->sync($permission_all);
            
    }
}
