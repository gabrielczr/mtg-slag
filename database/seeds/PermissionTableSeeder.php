<?php

use Illuminate\Database\Seeder;
use App\Role, App\User, App\Post, App\Permission;

class PermissionTableSeeder extends Seeder
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

		$manage = new Permission();
		$manage->slug = 'administrate';
		$manage->name = 'Administrate';
		$manage->save();
		$manage->roles()->attach($dev_role);

		$addNews = new Permission();
		$addNews->slug = 'add-newss';
		$addNews->name = 'Add News';
		$addNews->save();
		$addNews->roles()->attach($editor_role);
			}
}
