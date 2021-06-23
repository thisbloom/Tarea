<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Curso;
use App\Models\User;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function creartema(Request $data){
        $data->validate(
            [
                'video' =>'mimes:jpeg,bmp,png,jpg | max:2048',
            ]
        );

        $file = $data["video"];
        $nombre =  time()."_".$file->getClientOriginalName();
        if(strlen($nombre)<=150) {
            \Storage::disk('public')->put($nombre, \File::get($file));

            $tema = new Tema();
            $tema->titulo = $data["titulo"];
            $tema->descripción = $data["descripción"];
            $tema->video = $nombre;
            $tema->id_curso_tema = $data["id_curso_tema"];
            $tema->save();

            $resultados = Tema::where("id_curso_tema", $data["id_curso_tema"])->get();
            $curso = Curso::where("id", $data["id_curso_tema"])->get();
            return view("mostrartemas", ["resultados" => $resultados], ["curso"=>$curso]);

        }else{
            $mensaje = "El numero de caracteres debe ser menor a 150";
            return redirect()->route('temacreate', $mensaje);
        }
    }

    public function mostrartemas(string $id){
        $resultados = Tema::where("id_curso_tema", $id)->get();
        $curso = Curso::where("id", $id)->get();
        return view("mostrartemas", ["resultados" => $resultados], ["curso"=>$curso]);
    }

    public function vpeditar(string $id){
        $resultados = Tema::where("id",$id)->get(); //id del tema

        return view("editartema", ["resultados"=>$resultados]);
    }

    public function editar(Request $request){
        $request->validate(
            [
                'video' =>'mimes:jpeg,bmp,png,jpg | max:2048',
            ]
        );


        $file = $request["video"];
        $nombre =  time()."_".$file->getClientOriginalName();
        if(strlen($nombre)<=150) {
            \Storage::disk('public')->put($nombre, \File::get($file));


            $tema = Tema::find($request->id);
            $tema->titulo = $request->titulo;
            $tema->descripción = $request->descripción;
            $tema->video = $nombre;
            $tema->save();

        }else{
            $mensaje = "El numero de caracteres debe ser menor a 150";
            return redirect()->route('cursocreate', $mensaje);

        }
    }

}
