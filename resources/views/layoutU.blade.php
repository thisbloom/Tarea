<!DOCTYPE html>
<html lang="es">
<head>
    <title>Titulo de la web| Menos de 55 caracteres</title>
    <meta charset="utf-8" />
    <meta name="description" content="Debe contener las palabras clave, tratar de atraer clicks y de longitud entre 150 y 160 caracteres">
    <link rel="stylesheet" href="estilos.css" />
    <link rel="shortcut icon" href="/favicon.ico" />

    <style>
        .actual {
            color: #2d3748;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color: #D2E5E8">
<nav>
    <a href="/">Inicio</a>
    <a href="/BuscarCursos">Cursos</a>

    <a href="/MostrarCursos">Mis Cursos</a>
    <a href="/CrearCursos">Crear Cursos</a>

    <a href="/EditarCursos">Editar Cursos</a>
    <a href="/EliminarCursos">Eliminar Cursos</a>

</nav>
<header>
    <h1>Proyecto</h1>


</header>
<section>

    @yield("contenidoU")

</section>

<footer>
    {{--derechos reservados aqui irá el pie de pagina--}}
</footer>
</body>
</html>
