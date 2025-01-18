<!-- resources/views/youtube/index.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda en YouTube</title>
</head>

<body>

    <h1>Buscar Videos en YouTube</h1>

    <form action="{{ url('/youtube/search') }}" method="get">

        <input type="text" name="query" placeholder="Buscar..." required>
        <button type="submit">Buscar</button>
    </form>

</body>

</html>
