<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Str;

class UsersTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'adminweb')->firstOrFail();

        User::create([
            'name'           => 'Admin Web',
            'email'          => 'adminweb@adminweb.com',
            'password'       => bcrypt('password'),
            'remember_token' => Str::random(60),
            'role_id'        => $role->id,
        ]);
    }
}
