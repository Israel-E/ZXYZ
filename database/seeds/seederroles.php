<?php

use Illuminate\Database\Seeder;
use App\Role;
class seederroles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('roles')->insert(array(
			'name'=>'superadmin',
			'display_name'=>'superadmin',
			'description'=>'administrador Total'
		));

		\DB::table('roles')->insert(array(
			'name'=>'admin',
			'display_name'=>'admin',
			'description'=>'administrador pagina'
		));

		\DB::table('roles')->insert(array(
			'name'=>'usuarioA',
			'display_name'=>'usuarioA',
			'description'=>'usuarioA'
		));

		\DB::table('roles')->insert(array(
			'name'=>'usuarioB',
			'display_name'=>'usuarioB',
			'description'=>'usuarioB'
		));
    }
}
