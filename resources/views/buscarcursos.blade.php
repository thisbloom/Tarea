@extends('layout')

@section('content')

    <div class="container">
        @foreach($resultados as $curso)
        <div class="card mt-5 border-5 pt-2 active pb-0 px-3">
            <div class="card-body ">
                <div class="row">
                    <div class="col-12 ">
                        <h4 class="card-title "><b>{{$curso["nombre_curso"]}}</b></h4>
                    </div>
                    <div class="col">
                        <h6 class="card-subtitle mb-2 text-muted">
                            <p class="card-text text-muted small "> <img src="https://i.imgur.com/UkfzmBw.png" class="mr-1 " width="19" height="19" id="star"> <span class="vl mr-2 ml-0"></span> Creado por <span class="font-weight-bold"> @foreach($res as $user) @if($curso["creador_curso"]==$user["id"]) <th>{{$user["name"]}}</th> @endif @endforeach </span> </p>
                        </h6>
                        <h6>
                            <p class="card-text text-muted small "> <img src="https://i.imgur.com/TfHvSK3.png" class="mr-1 " width="19" height="19" id="star"> <span class="vl mr-2 ml-0"></span> Descripción del curso: {{$curso["desc_curso"]}}</p>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white px-0 ">
                <div class="row">
                    <div class=" col-md-auto "> <a class="btn btn-outlined btn-black text-muted bg-transparent" data-wow-delay="0.7s"><img src="https://i.imgur.com/VvTUMvO.png" width="19" height="19"> <small>{{$curso["precio_curso"]}}</small></a> <i class="mdi mdi-settings-outline"></i> <a href="/DetallesCurso/{{$curso["id"]}}" class=" btn-outlined btn-black text-muted"><img src="https://img.icons8.com/metro/26/000000/link.png" width="17" height="17" id="plus"> <small>ENLACE DEL CURSO</small> </a>  <span class="vl ml-3"></span> </div>
                    <div class="col-md-auto ">
                        <ul class="list-inline">
                            <li class="list-inline-item"> <img src="https://i.imgur.com/Dy7T8Nk.jpg" alt="DP" class=" rounded-circle img-fluid " width="35" height="35"> </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

