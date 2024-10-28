<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 p-8">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4 text-green-700">Edit Film</h1>
        <form action="/update/<?= $film->id ?>" method="POST" class="space-y-4">
            <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-green-300 rounded-md p-2">
            <div class="mb-4">
                <label for="title" class="block text-green-600">TITLE: </label>
                <input type="text" title="title" value="<?= htmlspecialchars($film->title) ?>" class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" required>
            </div>
            <div class="mb-4">
                <label for="director" class="block text-green-600">DIRECTOR:</label>
                <input type="text" title="director" value="<?= htmlspecialchars($film->director) ?>" class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" required>
            </div>
            <div class="mb-4">
                <label for="year" class="block text-green-600">YEAR: </label>
                <input type="number" title="year" value="<?= htmlspecialchars($film->year) ?>" class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" required>
            </div>
            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700">GENRE: </label>
                <input type="text" name="genre" id="genre" value="<?= htmlspecialchars($film->genre) ?>" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            </div>
            <div>
                <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    UPDATE
                </button>
            </div>
        </form>
        <a href="/" class="text-green-500 hover:text-green-700 mt-4 block">Return</a>
    </div>
</body>
</html>
