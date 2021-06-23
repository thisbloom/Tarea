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
        <form  enctype="multipart/form-data" method="post" action="/creartema2" >
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="card shadow border-0 mb-5">
                            <div class="card-body p-6">
                                <h2 class="h4 mb-1">Titulo del Tema</h2>
                                <p class="small text-muted font-italic mb-4">Ponle un titulo a este tema del curso</p>
                                <p class="mb-0"><input type="text" maxlength="150" name="titulo"/></p>
                            </div>

                            <div class="card-body p-6">
                                <h2 class="h4 mb-1">Descripción del Tema</h2>
                                <p class="small text-muted font-italic mb-4">Describe de que trata este tema</p>
                                <p class="mb-0"><input type="text" maxlength="150" name="descripción"/></p>
                            </div>

                            <div class="card-body p-6">
                                <h2 class="h4 mb-1">Video del Tema</h2>
                                <p class="small text-muted font-italic mb-4">Porfavor Ingrese el video del tema</p>
                                <p><input type="file" name="video"/></p>
                                @if(!empty($mensaje))
                                    <span class="error_span">{{$mensaje}}</span>
                                @endif
                            </div>
                            <input type="hidden" value="{{$idx}}" name="id_curso_tema" id="id_curso_tema">

                            <td colspan="5"><input type="submit" name="submit" value="Crear Tema"></td>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection



