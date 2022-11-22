<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions admin
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'create print member card']);
        Permission::create(['name' => 'read print member card']);
        Permission::create(['name' => 'update print member card']);
        Permission::create(['name' => 'delete print member card']);
        Permission::create(['name' => 'create book']);
        Permission::create(['name' => 'read book']);
        Permission::create(['name' => 'update book']);
        Permission::create(['name' => 'delete book']);
        Permission::create(['name' => 'create sticker code book']);
        Permission::create(['name' => 'read sticker code book']);
        Permission::create(['name' => 'update sticker code book']);
        Permission::create(['name' => 'delete sticker code book']);
        Permission::create(['name' => 'read catalog']);
        Permission::create(['name' => 'acc save book']);
        Permission::create(['name' => 'acc back book']);

        // create permission user
        Permission::create(['name' => 'access list book']);
        Permission::create(['name' => 'access list detail book']);
        Permission::create(['name' => 'access save book']);

        //create roles and assign existing permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo('access list book');
        $userRole->givePermissionTo('access list detail book');
        $userRole->givePermissionTo('access save book');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('create users');
        $adminRole->givePermissionTo('read users');
        $adminRole->givePermissionTo('update users');
        $adminRole->givePermissionTo('create print member card');
        $adminRole->givePermissionTo('read print member card');
        $adminRole->givePermissionTo('update print member card');
        $adminRole->givePermissionTo('create book');
        $adminRole->givePermissionTo('read book');
        $adminRole->givePermissionTo('update book');
        $adminRole->givePermissionTo('create sticker code book');
        $adminRole->givePermissionTo('read sticker code book');
        $adminRole->givePermissionTo('update sticker code book');
        $adminRole->givePermissionTo('read catalog');
        $adminRole->givePermissionTo('acc save book');
        $adminRole->givePermissionTo('acc back book');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create users
        $user = User::create([
            'username' => 'mikhael14',
            'fullname' => 'Mikhael Cs',
            'phone' => '081282190890',
            'address' => 'Jalan kemana kek',
            'profile_photo_path' => 'https://images.tokopedia.net/img/cache/215-square/shops-1/2019/11/12/6799691/6799691_987710a0-045a-43bc-9219-78583256a3da.png',
            'email' => 'kristianmikhael667@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole($userRole);

        $user = User::create([
            'username' => 'admin',
            'fullname' => 'Admin Duo',
            'phone' => '08192917011212',
            'address' => 'Jalan kerumah yuk',
            'profile_photo_path' => 'https://static.wikia.nocookie.net/doraemon/images/5/50/Shizu1979.PNG/revision/latest/scale-to-width-down/344?cb=20150530110156&path-prefix=en',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole($adminRole);

        $user = User::create([
            'username' => 'superadmin',
            'fullname' => 'Superadmin Duo',
            'phone' => '08192917019283',
            'address' => 'Jalan kebajo kek',
            'profile_photo_path' => 'https://cdn-image.hipwee.com/wp-content/uploads/2020/01/hipwee-Untitled-design-11-7.png',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole($superadminRole);
    }
}
