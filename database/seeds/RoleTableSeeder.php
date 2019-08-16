<?php

use Illuminate\Database\Seeder;
use App\Role, App\User, App\Post, App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev_permission = Permission::where('slug','administrate')->first();
		$editor_permission = Permission::where('slug', 'add-news')->first();

		//RoleTableSeeder.php
		$dev_role = new Role();
		$dev_role->slug = 'admin';
		$dev_role->name = 'Front-end Developer';
		$dev_role->save();
		$dev_role->permissions()->attach($dev_permission);

		$editor_role = new Role();
		$editor_role->slug = 'redac';
		$editor_role->name = 'Assistant editor';
		$editor_role->save();
		$editor_role->permissions()->attach($editor_permission);
			}
}
