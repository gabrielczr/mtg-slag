<?php

use Illuminate\Database\Seeder;
use App\Role, App\User, App\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_role = Role::where('slug','admin')->first();
		$editor_role = Role::where('slug', 'redac')->first();
		$dev_perm = Permission::where('slug','administrate')->first();
		$editor_perm = Permission::where('slug','add-news')->first();

		$developer = new User();
		$developer->name = 'Gabriel';
		$developer->email = 'mail@mail.com';
		$developer->password = bcrypt('secret');
		$developer->save();
		$developer->roles()->attach($dev_role);
		$developer->permissions()->attach($dev_perm);


		$editor = new User();
		$editor->name = 'Steve';
		$editor->email = 'mail1@mail.com';
		$editor->password = bcrypt('secret');
		$editor->save();
		$editor->roles()->attach($editor_role);
		$editor->permissions()->attach($editor_perm);
    }
}
