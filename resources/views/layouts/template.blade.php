<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardería</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background-color: #f4f6f9;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #1e293b;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a:hover {
            background-color: #2563eb;
        }

        .sidebar-title {
            color: #f59e0b;
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        /* CONTENIDO */
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-title">Guardería</div>

    <a href="{{ route('abonos.index') }}">Abonos</a>
    <a href="{{ route('ninios.index') }}">Niños</a>
    <a href="{{ route('alergias.index') }}">Alergias</a>
    <a href="{{ route('ingredientes.index') }}">Ingredientes</a>
    <a href="{{ route('personas.index') }}">Personas</a>
    <a href="{{ route('centros.index') }}">Centros</a>
    <a href="{{ route('bajaninios.index') }}">Bajas Niños</a>
    <a href="{{ route('platos.index') }}">Platos</a>
    <a href="{{ route('registrocomidas.index') }}">Registro Comidas</a>
    <a href="{{ route('registrarcuentas.index') }}">Registrar Cuentas</a>
    <a href="{{ route('familiares.index') }}">Familiares</a>
    <a href="{{ route('menus.index') }}">Menús</a>
     <a href="{{ route('parentezcos.index') }}">Parentezcos</a>
</div>

<!-- CONTENIDO -->
<div class="content">
    @yield('content')
</div>

</body>
</html>