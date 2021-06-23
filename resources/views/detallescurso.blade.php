@extends('layout')

@section('content')
    <div class="container">
        @foreach($resultados as $curso)
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset("storage/".$curso["img_curso"])}}" alt="Curso" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$curso["nombre_curso"]}}</h4>
                                    <p class="text-secondary mb-1">Creado por: </p>
                                    <p class="text-muted font-size-sm">@foreach($res as $user) @if($curso["creador_curso"]==$user["id"]) {{$user["name"]}} @endif @endforeach</p>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Descripción</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$curso["desc_curso"]}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Video(s)</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    10
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contacto</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @foreach($res as $user) @if($curso["creador_curso"]==$user["id"]) {{$user["email"]}} @endif @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Precio</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    s/. {{$curso["precio_curso"]}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">


                                        @if($curso["creador_curso"]==\Illuminate\Support\Facades\Auth::id())
                                            <a href="../ActualizarCurso/{{$curso["id"]}}"><button class="btn btn-outline-primary">Editar</button></a>
                                            <a href="../mostrartemas/{{$curso["id"]}}"><button class="btn btn-outline-primary">Mostrar Temas</button></a>
                                            <a href="../creartema/{{$curso["id"]}}"><button class="btn btn-outline-primary">Crear Tema</button></a>

                                        @else
                                        @php($usuario=0)
                                            @foreach($comprado as $compra)
                                                @if(\Illuminate\Support\Facades\Auth::id()==$compra["id_user"])
                                                @php($usuario=1)
                                                @endif
                                            @endforeach
                                            @if($usuario==1)
                                                <a href="../mostrartemas/{{$curso["id"]}}"><button class="btn btn-outline-primary">Ver videos</button></a>
                                            @else
                                                <a href="../comprarcurso/{{$curso["id"]}}"><button class="btn btn-outline-primary">Comprar</button></a>
                                            @endif
                                        @endif




                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            </div>

        </div>
        @endforeach
    </div>

@endsection
