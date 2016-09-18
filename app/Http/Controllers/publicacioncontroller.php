<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;
use App\publicaciones;
use App\multimedia;
use App\categoria;
use App\sitio;
use App\User;
class publicacioncontroller extends Controller
{
	use recursoscontroller; // definimos que utilizaremos el controlador condificarcontroller

    public function getpublicacion(){//encriptado
        $categorias = categoria::all()->toArray();//obtenemos todas las categorias
        $sitios =   sitio::all()->toArray();//obtenemos todas las stios
        for ($i=0; $i < sizeof($sitios) ; $i++) { 
            $sitios[$i]['id']=$this->encriptar($sitios[$i]['id']);
        }
        for ($i=0; $i < sizeof($categorias) ; $i++) { 
            $categorias[$i]['id']=$this->encriptar($categorias[$i]['id']);
        }
        $fecha_inicio = date("Y-m-d");//enviamos fecha  actual servidor de inicio de gestion
        $fecha_fin = date("Y-12-31");//enviamos fecha de fin de año
        return view('publicacion.formpublicaciones',['sitios'=>$sitios,'categorias'=>$categorias,'fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin]);
    }

    public function postimgs(Request $request){//encriptado y desencriptado
        $p = new publicaciones;
        $p->titulo = $request->input('titulo');
        $p->contenido = $request->input('contenido');
        $p->fecha_publicacion =$request->input('fecha_inicio');
        $p->fecha_caducidad= $request->input('fecha_fin');
        $p->id_tipo=$this->desencriptar($request->input('categoria'));
        $p->id_usuario=\Auth::user()->id;
        $p->save();//hasta aqui guardamos en la tabla publicaciones

         //guardamos relaciones de muchos a muchos con la tabla sitios
        for ($i=0; $i < sizeof($request->sitios); $i++) {
            $p->sitios()->attach($this->desencriptar($request->sitios[$i]));
        }
        //guardamos relacion uno a muchos publiacion -> multimedia(imagenes)
        $Ult_publicacion= publicaciones::all();//obtenemos las publicaciones
        //return dd($Ult_publicacion->last()->id);
        //
        //return "hola";
        for ($i=0; $i < sizeof($request->file) ; $i++) { 
            //obtenemos el campo file definido en el formulario
           $file = $request->file[$i];
           //cambiamos el nombre de la imagen para tener un registro unico
           $nombre = Carbon::now()->timestamp.''.$this->nombrealeatorio().'.'. $file->getClientOriginalExtension();
           //indicamos que queremos guardar un nuevo archivo en el disco local imagenes
           \Storage::disk('imagenes')->put($nombre,  \File::get($file));
           $m = new multimedia;
           $m->nombre_multimedia = $nombre;
           $m->tipo='imagen';
           $m->id_publicacion=$Ult_publicacion->last()->id;
           $m->save();
        }

        if($request->input('videos') == "Yes")
        {
            $videos = $request->input('video');
            //return ($videos);
            foreach ($videos as $video) 
            {
                $url = $video;
                $m = new multimedia;
                $m->nombre_multimedia = $url;
                $m->tipo='video';
                $m->id_publicacion=$Ult_publicacion->last()->id;
                $m->save();
            }
        }

        return 'Registro Existoso';

    }


    public function controlpaginas($id){//encriptado
        $id=$this->desencriptar($id);
        $pagina=$id;
        $hoy= date("Y-m-d");
        $pubxsitio = sitio::find($id)
                    ->publicaciones()
                    ->select('*')
                    ->where('fecha_publicacion','<=',$hoy)//publicaciones en rango para ser publicadass
                    ->where('fecha_caducidad','>=',$hoy)
                    ->latest()
                    ->get();//obtenemos todas las publicaciones referente al sitio
        //return dd($pubxsitio);
        for ($i=0; $i < sizeof($pubxsitio) ; $i++) { 
            $autor = \DB::table('users')
                ->select('*')
                ->where('id',$pubxsitio[$i]->id_usuario)
                ->first();
            //agregamos el atributo al objeto
            $pubxsitio[$i]->usuario=$autor->nombre.' '.$autor->apellidoP;
            $pubxsitio[$i]->ci=$autor->ci;
        }
        //categoria
        for ($i=0; $i < sizeof($pubxsitio) ; $i++) { 
            $categoria = categoria::find($pubxsitio[$i]->id_tipo);
            //agregamos el atributo al objeto
            $pubxsitio[$i]->categoria=$categoria->categoria;
        }

        $pubxsitio = $pubxsitio->toArray();//retornamos todo en un array;
        //return dd($pubxsitio);
        //encriptamos para enviar a la plantilla
        for ($i=0; $i < sizeof($pubxsitio) ; $i++) { 
            $pubxsitio[$i]['id']=$this->encriptar($pubxsitio[$i]['id']);
            $pubxsitio[$i]['id_tipo']=$this->encriptar($pubxsitio[$i]['id_tipo']);
            $pubxsitio[$i]['id_usuario']=$this->encriptar($pubxsitio[$i]['id_usuario']);
            $pubxsitio[$i]['publicaciones_id']=$this->encriptar($pubxsitio[$i]['publicaciones_id']);
            $pubxsitio[$i]['sitio_id']=$this->encriptar($pubxsitio[$i]['sitio_id']);
            $pubxsitio[$i]['estado_id']=$this->encriptar($pubxsitio[$i]['estado_id']);
        }
        //return dd($pubxsitio);
        $pagina = $this->encriptar($pagina);
        /////////////////////////////////////////////////
        return view('control.controlpaginas',['pubxsitio'=>$pubxsitio,'pagina'=>$pagina]);
    }

    public function estadopublicacion($id,$id_pagina){//encriptado
        $id=$this->desencriptar($id);
        $id_pagina=$this->desencriptar($id_pagina);
        $estado_actual = \DB::table('publicaciones_sitio')
            ->select('*')
            ->where('publicaciones_id', $id)
            ->where('sitio_id', $id_pagina)
            ->get();
        if($estado_actual[0]->estado_id === 3){
            \DB::table('publicaciones_sitio')
                ->where('publicaciones_id', $id)
                ->where('sitio_id', $id_pagina)
                ->update(['estado_id' => 4]);
        }
        else{
            \DB::table('publicaciones_sitio')
                ->where('publicaciones_id', $id)
                ->where('sitio_id', $id_pagina)
                ->update(['estado_id' => 3]);
        }
        $id_pagina = $this->encriptar($id_pagina);
        return redirect()->route('control_pagina', [$id_pagina]);
    }

    public function editarpub($id){
        
        $id = $this->desencriptar($id);
        //enviamos los requisitos que tiene la pagina de post publicacion
        $fecha_inicio = date("Y-m-d");//enviamos fecha  actual servidor de inicio de gestion
        $fecha_fin = date("Y-12-31");//enviamos fecha de fin de año
        $categorias = categoria::all()->toArray();//obtenemos todas las categorias
        $sitios =   sitio::all()->toArray();//obtenemos todas las stios
        for ($i=0; $i < sizeof($sitios) ; $i++) { 
            $sitios[$i]['id']=$this->encriptar($sitios[$i]['id']);
        }
        for ($i=0; $i < sizeof($categorias) ; $i++) { 
            $categorias[$i]['id']=$this->encriptar($categorias[$i]['id']);
        }

        
    
        $hoy= date("Y-m-d");

        //recuperamos la publicacion
        $publicacion = publicaciones::find($id);
        //recuperamos los sitios donde fue publicado
        $sti = Array();
        $sitios_publicados = \DB::table('publicaciones_sitio')
                ->select('*')
                ->where('publicaciones_id',$publicacion->id)
                ->get();

        for ($i=0; $i < sizeof($sitios_publicados) ; $i++) { 
            $sti[$i]=$this->encriptar($sitios_publicados[$i]->sitio_id);
        }        
        $publicacion->sitios=$sti;
        

        //buscamos sus autor publicacion
        $autor = User::find($publicacion->id_usuario);
        $publicacion->usuario=$autor->nombre.' '.$autor->apellidoP;

        //categoria de publicacion
        $categoria = categoria::find($publicacion->id_tipo);
        $publicacion->categoria=array("id"=>$this->encriptar($categoria->id));
        
        //recuperamos  multimedia de la publicacion
        $mult = Array();
        $pub_multimedia = \DB::table('multimedia')
                ->select('*')
                ->where('id_publicacion',$publicacion->id)
                ->get();

        for ($i=0; $i < sizeof($pub_multimedia) ; $i++) { 
            if($pub_multimedia[$i]->tipo == 'imagen'){
                $img = base64_encode(\Storage::disk('imagenes')->get($pub_multimedia[$i]->nombre_multimedia));
                $mult[$i]=array("id"=>$this->encriptar($pub_multimedia[$i]->id), "multimedia"=>$img, "tipo"=>$pub_multimedia[$i]->tipo);
            }
            else{
                $mult[$i]=array("id"=>$this->encriptar($pub_multimedia[$i]->id), "multimedia"=>$pub_multimedia[$i]->nombre_multimedia, "tipo"=>$pub_multimedia[$i]->tipo);
            }
            
            
        }
        $publicacion->multimedia=$mult;
        ////-////-///-///-//-/

        $publicacion = $publicacion->toArray();//retornamos todo en un array;
        $id_pub = $publicacion['id'] = $this->encriptar($publicacion['id']);
        //return dd();
        //return dd($publicacion);
        return view('publicacion.editarpublicacion',['publicacion'=>$publicacion,'sitios'=>$sitios,'categorias'=>$categorias,'fecha_inicio'=>$fecha_inicio,'fecha_fin'=>$fecha_fin]);
    }

    public function eliminar_foto($id,$id_p){
        $id = $this -> desencriptar($id);
        $id_p = $this -> desencriptar($id_p);
        //return $id.'   '.$id_p;
        \DB::table('multimedia')->where('id', $id)->delete();
        $mult = Array();
        $multimedia = \DB::table('multimedia')
                ->select('*')
                ->where('id_publicacion',$id_p)
                ->get();

        for ($i=0; $i < sizeof($multimedia) ; $i++) { 
            if($multimedia[$i]->tipo == 'imagen'){
                $img = base64_encode(\Storage::disk('imagenes')->get($multimedia[$i]->nombre_multimedia));
                $mult[$i]=array("id_p"=>$this->encriptar($id_p), "id"=>$this->encriptar($multimedia[$i]->id), "multimedia"=>$img, "tipo"=>$multimedia[$i]->tipo);
            }
            else{
                $mult[$i]=array("id_p"=>$this->encriptar($id_p),"id"=>$this->encriptar($multimedia[$i]->id), "multimedia"=>$multimedia[$i]->nombre_multimedia, "tipo"=>$multimedia[$i]->tipo);
            }            
        }
        return $mult;
    }

    public function editpub(Request $request){
        $id_publicacion = $this -> desencriptar($request->input('rca'));
        //return dd($request->sitios);
        $p = publicaciones::find($id_publicacion);
        $p->titulo = $request->input('titulo');
        $p->contenido = $request->input('contenido');
        $p->fecha_publicacion =$request->input('fecha_inicio');
        $p->fecha_caducidad= $request->input('fecha_fin');
        $p->id_tipo=$this->desencriptar($request->input('categoria'));
        $p->id_usuario=\Auth::user()->id;
        $p->save();//hasta aqui guardamos en la tabla publicaciones

         //guardamos relaciones de muchos a muchos con la tabla sitios
        $sitios = Array();
        for ($i=0; $i < sizeof($request->sitios); $i++) {
            $sitios[$i] = $this->desencriptar($request->sitios[$i]);
        }
        $p->sitios()->sync($sitios);

        //guardamos relacion uno a muchos publiacion -> multimedia(imagenes)
        $Ult_publicacion= publicaciones::all();//obtenemos las publicaciones
        //return dd($Ult_publicacion->last()->id);
        //
        //return "hola";
        
        if (sizeof($request->file) > 1) {
            for ($i=0; $i < sizeof($request->file) ; $i++) { 
                //obtenemos el campo file definido en el formulario
               $file = $request->file[$i];
               //cambiamos el nombre de la imagen para tener un registro unico
               $nombre = Carbon::now()->timestamp.''.$this->nombrealeatorio().'.'. $file->getClientOriginalExtension();
               //indicamos que queremos guardar un nuevo archivo en el disco local imagenes
               \Storage::disk('imagenes')->put($nombre,  \File::get($file));
               $m = new multimedia;
               $m->nombre_multimedia = $nombre;
               $m->tipo='imagen';
               $m->id_publicacion=$Ult_publicacion->last()->id;
               $m->save();
            }
        }
        
        if (sizeof($request->input('video')) > 1) {
            if($request->input('videos') == "Yes")
            {
                $videos = $request->input('video');
                //return ($videos);
                foreach ($videos as $video) 
                {
                    $url = $video;
                    $m = new multimedia;
                    $m->nombre_multimedia = $url;
                    $m->tipo='video';
                    $m->id_publicacion=$Ult_publicacion->last()->id;
                    $m->save();
                }
            }
        }
        return 'Edicion Existoso';
    }
}
