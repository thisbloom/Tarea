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
        <form method="post" action="/crearcursos2">
            @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card shadow border-0 mb-5">
                        <div class="card-body p-5">
                            <h2 class="h4 mb-1">Nombre del Curso</h2>
                            <p class="small text-muted font-italic mb-4">Ponle un nombre al curso que quieres crear</p>
                            <p class="mb-0"><input type="text" maxlength="150" name="nombre_curso"/></p>
                        </div>

                        <div class="card-body p-5">
                            <h2 class="h4 mb-1">Descripción del Curso</h2>
                            <p class="small text-muted font-italic mb-4">Describe el curso que estás creando</p>
                            <p class="mb-0"><input type="text" maxlength="150" name="desc_curso"/></p>
                        </div>

                        <div class="card-body p-5">
                            <h2 class="h4 mb-1">Precio del curso</h2>
                            <p class="small text-muted font-italic mb-4">Describe el curso que estás creando</p>
                            <p><input type="number" maxlength="150" name="precio_curso"/></p>
                        </div>

                        <td colspan="5"><input type="submit" name="submit" value="Crear Curso"></td>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection



