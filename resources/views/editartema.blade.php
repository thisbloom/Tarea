@extends("layout")

@section("content")

    <section class="py-5 header text-center text-black-50">
        <div class="container pt-4">
            <header>
                <h2 class="display-5">Bienvenido a la creación de cursos</h2>
            </header>
        </div>
    </section>


    <section>
        <form  enctype="multipart/form-data" method="post" action="/editartema" >
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        @foreach($resultados as $tema)
                        <div class="card shadow border-0 mb-5">
                            <p><input type="hidden" name="id" value="{{$tema["id"]}}"/></p>
                            <div class="card-body p-6">
                                <h2 class="h4 mb-1">Titulo del Tema</h2>
                                <p class="small text-muted font-italic mb-4">Ponle un titulo a este tema del curso</p>
                                <p class="mb-0"><input type="text" maxlength="150" name="titulo" value="{{$tema["titulo"]}}"/></p>
                            </div>

                            <div class="card-body p-6">
                                <h2 class="h4 mb-1">Descripción del Tema</h2>
                                <p class="small text-muted font-italic mb-4">Describe de que trata este tema</p>
                                <p class="mb-0"><input type="text" maxlength="150" name="descripción" value="{{$tema["descripción"]}}"/></p>
                            </div>

                            <div class="card-body p-6">
                                <h2 class="h4 mb-1">Video del Tema</h2>
                                <p class="small text-muted font-italic mb-4">Porfavor Ingrese el video del tema</p>
                                <p><input type="file" name="video"/></p>
                                @if(!empty($mensaje))
                                    <span class="error_span">{{$mensaje}}</span>
                                @endif
                            </div>

                            <td colspan="5"><input type="submit" name="submit" value="Crear Tema"></td>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection

