<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 flex flex-col min-h-screen">

<main class="flex-grow p-4 sm:p-8">
    <div class="max-w-full mx-auto bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-3xl sm:text-4xl font-bold mb-6 sm:mb-8 text-center text-green-700 uppercase tracking-wide">
            <span class="bg-green-100 px-3 py-1 sm:px-4 sm:py-2 rounded-lg shadow-sm">Films</span>
        </h2>

        <div class="bg-green-100 p-4 rounded-lg mb-6">
            <div class="flex justify-center gap-2">
                <a href="/create" class="bg-green-600 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-green-700 font-bold text-sm sm:text-base">ADD</a>
                <a href="#" class="bg-green-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-blue-600 font-bold text-sm sm:text-base" onclick="editSelected()">EDIT</a>
                <a href="#" class="bg-green-400 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-red-600 font-bold text-sm sm:text-base" onclick="deleteSelected()">DELETE</a>
            </div>
        </div>

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full bg-white border border-green-200">
                <thead>
                <tr class="bg-green-100 text-green-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">SELECT</th>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">TITLE</th>
                    <th class="py-3 px-6 text-left">DIRECTOR</th>
                    <th class="py-3 px-6 text-left">YEAR</th>
                    <th class="py-3 px-6 text-left">GENRE</th>
                </tr>
                </thead>
                <tbody class="text-green-600 text-sm font-light">
                <?php if (empty($films)): ?>
                <tr>
                    <td colspan="6" class="py-3 px-6 text-center">Film not found</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($films as $film): ?>
                <tr class="border-b border-green-100 hover:bg-green-50">
                    <td class="py-3 px-6"><input type="checkbox" name="selected" value="<?=$film['id'] ?>" onchange="handleCheckboxChange(this)"></td>
                    <td class="py-3 px-6"><?=$film['id'] ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($film['title']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($film['director']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($film['year']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($film['genre']) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-4">
            <?php if (empty($films)): ?>
            <p class="text-center text-green-600">Film not found</p>
            <?php else: ?>
                <?php foreach ($films as $film): ?>
            <div class="bg-white border border-green-200 rounded-lg p-4 shadow-sm">
                <input type="checkbox" name="selected" value="<?=$film['id'] ?>" class="float-right" onchange="handleCheckboxChange(this)">
                <p class="text-sm font-semibold text-green-700">ID: <?=$film['id'] ?></p>
                <h3 class="text-lg font-bold text-green-800 mt-1"><?= htmlspecialchars($film['title']) ?></h3>
                <p class="text-green-600"><span class="font-semibold">Director:</span> <?= htmlspecialchars($film['director']) ?></p>
                <p class="text-green-600"><span class="font-semibold">Year:</span> <?= htmlspecialchars($film['year']) ?></p>
                <p class="text-green-600"><span class="font-semibold">Genre:</span> <?= htmlspecialchars($film['genre']) ?></p>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Are you sure you want to delete the selected film?</h2>
        <div class="flex justify-end gap-4">
            <button id="confirmYes" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Yes</button>
            <button id="confirmNo" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">No</button>
        </div>
    </div>
</div>

<script>
    function handleCheckboxChange(checkbox) {
        var checkboxes = document.getElementsByName('selected');
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false;
        });
    }

    function editSelected() {
        var selected = document.querySelector('input[name="selected"]:checked');
        if (selected) {
            var id = selected.value;
            window.location.href = '/edit/' + id;
        } else {
            alert('Select a film to edit');
        }
    }

    function deleteSelected() {
        var selected = document.querySelector('input[name="selected"]:checked');
        if (selected) {
            var id = selected.value;
            var confirmModal = document.getElementById('confirmModal');
            confirmModal.classList.remove('hidden');

            document.getElementById('confirmYes').onclick = function() {
                window.location.href = '/delete/' + id;
            };

            document.getElementById('confirmNo').onclick = function() {
                confirmModal.classList.add('hidden');
            };
        } else {
            alert('Select a film to delete');
        }
    }
</script>
</body>
</html>