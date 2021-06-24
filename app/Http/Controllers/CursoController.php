<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Compra;
use App\Models\User;
use Auth;


class CursoController extends Controller
{
    public function crear(Request $data){
        $data->validate(
            [
                'img_curso' =>'mimes:jpeg,bmp,png,jpg | max:2048',
            ]
        );


        $file = $data["img_curso"];
        $nombre =  time()."_".$file->getClientOriginalName();
        if(strlen($nombre)<=150) {
            \Storage::disk('public')->put($nombre, \File::get($file));

            $id_usuario = Auth::id();
            $res = User::get();
            $curso = new Curso();
            $curso->nombre_curso = $data["nombre_curso"];
            $curso->desc_curso = $data["desc_curso"];
            $curso->precio_curso = $data["precio_curso"];
            $curso->img_curso = $nombre;
            $curso->creador_curso = $id_usuario;
            $curso->save();
            return redirect()->route('mostrarxcurso');


        }else{
            $mensaje = "El numero de caracteres debe ser menor a 150";
            return redirect()->route('cursocreate', $mensaje);

        }

    }


    public function vpactualizar(string $id){
        $resultados = Curso::where("id",$id)->get(); //id curso

        return view("actualizarcursos", ["resultados"=>$resultados]);
    }


    public function actualizar(Request $request){
        $request->validate(
            [
                'img_curso' =>'mimes:jpeg,bmp,png,jpg | max:2048',
            ]
        );


        $file = $request["img_curso"];
        $nombre =  time()."_".$file->getClientOriginalName();
        if(strlen($nombre)<=150) {
            \Storage::disk('public')->put($nombre, \File::get($file));


        $curso = Curso::find($request->id);
        $curso->nombre_curso = $request->nombre_curso;
        $curso->desc_curso = $request->desc_curso;
        $curso->precio_curso = $request->precio_curso;
        $curso->img_curso = $nombre;
        $curso->save();
        return redirect()->route('mostrarxcurso');

        }else{
            $mensaje = "El numero de caracteres debe ser menor a 150";
            return redirect()->route('cursocreate', $mensaje);

        }
    }


    public function mostrar(){
        $resultados = Curso::get();
        $res = User::get();
        $compra = Compra::get(); //para saber si el curso esta comprado
        return view("buscarcursos", ["resultados"=>$resultados], ["res"=>$res, "compra"=>$compra]);
    }


    public function creados(){
        $id_usuario = Auth::id();
        $resultados = Curso::where("creador_curso",$id_usuario)->get();
        $res = User::get();
        return view("buscarcursos", ["resultados"=>$resultados], ["res"=>$res]);
    }


    public function detalles(string $id){
        $usuarioactual = Auth::id(); //usuario logeado
        $usractual = User::where("id",$usuarioactual)->get(); //usuario logeado string

        $resultados = Curso::where("id",$id)->get(); //id curso
        $res = User::get(); //creador del curso
        $comprado = Compra::where("id_curso",$id)->get(); //para saber si el curso esta comprado


        return view("detallescurso", ["resultados"=>$resultados, "usractual"=>$usractual], ["res"=>$res, "comprado"=>$comprado]);
    }


}
