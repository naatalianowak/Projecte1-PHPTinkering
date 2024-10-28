<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta title="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 p-8">
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4 text-green-700">Add New Film</h1>
    <form action="/store" method="POST" class="space-y-4">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-green-600">Title:</label>
            <input type="text" title="title" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter film title">
        </div>

        <div class="mb-4">
            <label for="director" class="block text-sm font-medium text-green-600">Director:</label>
            <input type="text" title="director" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter director's title">
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-green-600">Year:</label>
            <input type="number" title="year" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter release year">
        </div>

        <div class="mb-4">
            <label for="genre" class="block text-sm font-medium text-green-600">Genre:</label>
            <select name="genre" id="genre" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500">
                <option value="">Select a genre</option>
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="Comedy">Comedy</option>
                <option value="Crime">Crime</option>
                <option value="Drama">Drama</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Horror">Horror</option>
                <option value="Mystery">Mystery</option>
                <option value="Romance">Romance</option>
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Thriller">Thriller</option>
                <option value="Western">Western</option>
            </select>
        </div>

        <div>
            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
               Create Film
            </button>
        </div>
    </form>
</div>
</body>
</html>
