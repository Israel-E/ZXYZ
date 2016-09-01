<?php

use Illuminate\Database\Seeder;
use App\Permission;
class seederpermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Permission::Create([
			'name'=>'Editar',
			'display_name'=>'Editar',
			'description'=>'Editar'
		]);
		Permission::Create([
			'name'=>'Baja',
			'display_name'=>'Baja',
			'description'=>'Baja'
		]);
		Permission::Create([
			'name'=>'Habilitar',
			'display_name'=>'Habilitar',
			'description'=>'Habilitar'
		]);
		Permission::Create([
			'name'=>'Deshabilitar',
			'display_name'=>'Deshabilitar',
			'description'=>'Deshabilitar'
		]);
		Permission::Create([
			'name'=>'Publicar',
			'display_name'=>'Publicar',
			'description'=>'Publicar'
		]);
		Permission::Create([
			'name'=>'NoPublicar',
			'display_name'=>'NoPublicar',
			'description'=>'NoPublicar'
		]);
    }
}
