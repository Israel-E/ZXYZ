<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\sitio;
class welcomecontroller extends Controller
{
	use recursoscontroller;
    public function welcome(){
        $sitios = sitio::all()->toArray();
        for ($i=0; $i < sizeof($sitios) ; $i++) { 
            $sitios[$i]['id']=$this->encriptar($sitios[$i]['id']);
        }

        $hoy= date("Y-m-d");
        $pubgob = sitio::find(1)
                ->publicaciones()
                ->where('fecha_publicacion','<=',$hoy)
                ->where('fecha_caducidad','>=',$hoy)
                ->where('estado_id',3)
                ->latest()
                ->take(6)
                ->get();
        for ($i=0; $i < sizeof($pubgob) ; $i++) { 
            $imgfirst = \DB::table('multimedia')//obtenemos la primera imagen
                ->select('nombre_multimedia','tipo')
                ->where('id_publicacion',$pubgob[$i]->id)
                ->where('tipo','imagen')
                ->first();
                if(sizeof($imgfirst)>0){
                    if (\Storage::disk('imagenes')->exists($imgfirst->nombre_multimedia)===false) {
                        return "error no se encuentra la imagen ".$imgfirst->nombre_multimedia;
                    }
                    //agregamos el atributo al objeto
                    $pubgob[$i]->img=base64_encode(\Storage::disk('imagenes')->get($imgfirst->nombre_multimedia));
                    $pubgob[$i]->tipo=$imgfirst->tipo;
                }else{
                    $pubgob[$i]->img='no img';
                    $pubgob[$i]->tipo='no img';
                }
        }

        $pubgob = $pubgob->toArray();
        for ($i=0; $i < sizeof($pubgob) ; $i++) { 
            $pubgob[$i]['id']=$this->encriptar($pubgob[$i]['id']);
        }
        return view('welcome',['sitios'=>$sitios,'pubgob'=>$pubgob]);
    }
}
