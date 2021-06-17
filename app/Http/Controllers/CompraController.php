<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Curso;
use App\Models\User;
use DateTime;

use Auth;


class CompraController extends Controller
{
    public function comprar(string $id)
    {
        $id_usuario = Auth::id();
        $fecha = new DateTime();
        $compra = new Compra();
        $compra->fecha_compra = $fecha;
        $compra->id_user = $id_usuario;
        $compra->id_curso = $id;
        $compra->save();

        //$resultados = Curso::get();
        //$res = User::get();
        //return view("buscarcursos", ["resultados"=>$resultados], ["res"=>$res]);

    }

    public function mostrar(){
        $id_usuario = Auth::id();
        $resultadosCompra = Compra::where("id_user",$id_usuario)->get();
        $resultadosCurso = Curso::get();
        $res = User::get();
        return view("mostrarcompras", ["resultadosCompra"=>$resultadosCompra, "resultadosCurso"=>$resultadosCurso], ["res"=>$res]);
    }

}
