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
    <h1 class="text-2xl font-bold mb-4 text-green-700">Add New Show</h1>
    <form action="/shows/store" method="POST" class="space-y-4">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-green-600">Title:</label>
            <input type="text" name="title" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter show title">
        </div>

        <div class="mb-4">
            <label for="director" class="block text-sm font-medium text-green-600">Director:</label>
            <input type="text" name="director" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter director's name">
        </div>

        <div class="mb-4">
            <label for="year" class="block text-sm font-medium text-green-600">Year:</label>
            <input type="number" name="year" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter release year">
        </div>

        <div class="mb-4">
            <label for="episodes" class="block text-sm font-medium text-green-600">Episodes:</label>
            <input type="number" name="episodes" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50" placeholder="Enter number of episodes">
        </div>

        <div class="mb-4">
            <label for="platform" class="block text-sm font-medium text-green-600">Platform:</label>
            <select name="platform" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500">
                <option value="" disabled selected>Select a platform</option>
                <option value="Netflix">Netflix</option>
                <option value="Amazon Prime">Amazon Prime</option>
                <option value="Hulu">Hulu</option>
                <option value="Disney+">Disney+</option>
                <option value="HBO Max">HBO Max</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="protagonist" class="block text-sm font-medium text-green-600">Protagonist:</label>
            <input type="text" name="protagonist" required class="mt-1 block w-full border border-green-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" placeholder="Enter protagonist's name">
        </div>

        <div>
            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Create Show
            </button>
        </div>
    </form>
</div>
</body>
</html>