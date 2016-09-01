<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait; //hacemos uso del trait en la clase User para hacer uso de sus métodos
    //quitar por un momento para realizar el seeder
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidosP','apellidoM','ci','email', 'password','id_estado','id_unidad',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //establecemos las relaciones con el modelo Role, ya que un usuario puede tener varios roles
    //y un rol lo pueden tener varios usuarios
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public static function filterAndPaginate($nombres)
    {
        $users = \DB::table('users')
            ->join('unidads', 'users.id_unidad', '=', 'unidads.id')
            ->join('estados', 'users.id_estado', '=', 'estados.id')
            ->where('users.nombre', 'ilike', "%$nombres%")->orWhere('users.apellidoP', 'ilike', "%$nombres%")->orWhere('users.apellidoM', 'ilike', "%$nombres%")
            ->select('users.id', 'users.nombre', 'users.apellidoP', 'users.apellidoM', 'users.ci','users.email', 'users.id_estado', 'unidads.unidad', 'estados.nombre as nombre_estado')
            ->paginate(8);
        return $users;
    }

    public function InsertarRoles($id_user, $roles)
    {
        foreach ($roles as $rol)
        {
            $id_rol = \DB::table('roles')->where('name', $rol)->pluck('id');
            \DB::table('role_user')->insert(array(
                'user_id' => $id_user,
                'role_id' => $id_rol[0]
            ));
        }
    }

    public function EditarRoles($id_user, $roles)
    {
        \DB::table('role_user')->where('user_id', '=', $id_user)->delete();
        $this->InsertarRoles($id_user, $roles);
    }

}
