<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba</title>
</head>
<body>
    <h1>prueba DB</h1>
    @if ($status)
        <p>Conexión exitosa a la base de datos</p>
        <p>mensaje: {{ $message }}</p>
        <p>Base de datos: {{ $database }}</p>
        <p>Versión: {{ $version }}</p>
    @else
        <p>Error al conectar a la base de datos</p>
        <p>Mensaje: {{ $message }}</p>
    @endif
</body>
</html>