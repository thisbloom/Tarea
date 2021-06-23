@extends('layout')

@section('content')
    <div class="container">
    @foreach($resultados as $tema)

        <div class="card mt-5 border-5 p-3 active pb-0 px-3">
            <div class="d-flex align-items-center">
                <div class="image"> <img src="{{asset("storage/".$tema["video"])}}" class="rounded" width="155"> </div>
                <div class="ml-3 w-100">
                    <h4 class="mb-0 mt-0">{{$tema["titulo"]}}</h4> <span>{{$tema["descripción"]}}</span>
                    <div class="p-2 mt-2 d-flex justify-content-between rounded text-white stats">

                    </div>
                    @foreach($curso as $cursos)@if(\Illuminate\Support\Facades\Auth::id()==$cursos["creador_curso"])<div class="button mt-2 d-flex flex-row align-items-center"> <a href="/editartema/{{$tema["id"]}}" class=" btn-outlined btn-black text-muted"> <button class="btn btn-sm btn-outline-primary w-100">Editar</button></a> </div>@endif @endforeach
                </div>
            </div>
        </div>
    @endforeach
    </div>

@endsection
