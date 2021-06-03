<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Auth;

class CursoController extends Controller
{
    public function crear(Request $data){
        $id_usuario = Auth::id();
        $res = User::get();
        $curso = new Curso();
        $curso->nombre_curso = $data["nombre_curso"];
        $curso->desc_curso = $data["desc_curso"];
        $curso->precio_curso = $data["precio_curso"];
        $curso->creador_curso = $id_usuario;
        $curso->save();
        $resultados = Curso::where("creador_curso",$id_usuario)->get();
        return view("buscarcursos", ["resultados"=>$resultados], ["res"=>$res]);

    }


    public function mostrar(){
        $resultados = Curso::get();
        $res = User::get();
        return view("buscarcursos", ["resultados"=>$resultados], ["res"=>$res]);
    }


    public function creados(){
        $id_usuario = Auth::id();
        $resultados = Curso::where("creador_curso",$id_usuario)->get();
        $res = User::get();
        return view("buscarcursos", ["resultados"=>$resultados], ["res"=>$res]);
    }


    public function detalles(string $id){
        $resultados = Curso::where("id",$id)->get();
        $res = User::get();
        return view("detallescurso", ["resultados"=>$resultados], ["res"=>$res]);
    }


}
