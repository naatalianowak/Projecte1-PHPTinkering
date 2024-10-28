<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 p-8">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4 text-green-700">DELETE SHOW: </h1>
        <p class="text-green-600 mb-4">Do you want to delete this show: "<?= htmlspecialchars($show->title) ?>"?</p>
        <form action="/shows/destroy" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $show->id ?>">
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 mr-2">DELETE</button>
            <a href="/shows" class="inline-block bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">RETURN</a>
        </form>
    </div>
</body>
</html>
