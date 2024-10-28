<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shows</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 flex flex-col min-h-screen">
<main class="flex-grow p-4 sm:p-8">
    <div class="max-w-full mx-auto bg-white shadow-md rounded-lg p-4 sm:p-6">
        <h2 class="text-3xl sm:text-4xl font-bold mb-6 sm:mb-8 text-center text-green-700 uppercase tracking-wide">
            <span class="bg-green-100 px-3 py-1 sm:px-4 sm:py-2 rounded-lg shadow-sm">Shows</span>
        </h2>

        <div class="bg-green-100 p-4 rounded-lg mb-6">
            <div class="flex justify-center gap-2">
                <a href="/shows/create" class="bg-green-600 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-green-700 font-bold text-sm sm:text-base">ADD</a>
                <a href="#" class="bg-green-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-green-600 font-bold text-sm sm:text-base" onclick="editSelected()">EDIT</a>
                <a href="#" class="bg-green-400 text-white px-3 py-1 sm:px-4 sm:py-2 rounded hover:bg-green-500 font-bold text-sm sm:text-base" onclick="deleteSelected()">DELETE</a>
            </div>
        </div>

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full bg-white border border-green-200">
                <thead>
                <tr class="bg-green-100 text-green-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">SELECT</th>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">TITLE</th>
                    <th class="py-3 px-6 text-left">YEAR</th>
                    <th class="py-3 px-6 text-left">EPISODES</th>
                    <th class="py-3 px-6 text-left">PLATFORM</th>
                    <th class="py-3 px-6 text-left">PROTAGONIST</th>
                </tr>
                </thead>
                <tbody class="text-green-600 text-sm font-light">
                <?php if (empty($shows)): ?>
                <tr>
                    <td colspan="7" class="py-3 px-6 text-center">Show not found</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($shows as $show): ?>
                <tr class="border-b border-green-100 hover:bg-green-50">
                    <td class="py-3 px-6"><input type="checkbox" name="selected" value="<?=$show['id'] ?>" onchange="handleCheckboxChange(this)"></td>
                    <td class="py-3 px-6"><?=$show['id'] ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($show['title']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($show['year']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($show['episodes']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($show['platform']) ?></td>
                    <td class="py-3 px-6"><?= htmlspecialchars($show['protagonist']) ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="md:hidden space-y-4">
            <?php if (empty($shows)): ?>
            <p class="text-center text-green-600">Show not found</p>
            <?php else: ?>
                <?php foreach ($shows as $show): ?>
            <div class="bg-white border border-green-200 rounded-lg p-4 shadow-sm">
                <input type="checkbox" name="selected" value="<?=$show['id'] ?>" class="float-right" onchange="handleCheckboxChange(this)">
                <p class="text-sm font-semibold text-green-700">ID: <?=$show['id'] ?></p>
                <h3 class="text-lg font-bold text-green-800 mt-1"><?= htmlspecialchars($show['title']) ?></h3>
                <p class="text-green-600"><span class="font-semibold">Year:</span> <?= htmlspecialchars($show['year']) ?></p>
                <p class="text-green-600"><span class="font-semibold">Episodes:</span> <?= htmlspecialchars($show['episodes']) ?></p>
                <p class="text-green-600"><span class="font-semibold">Platform:</span> <?= htmlspecialchars($show['platform']) ?></p>
                <p class="text-green-600"><span class="font-semibold">Protagonist:</span> <?= htmlspecialchars($show['protagonist']) ?></p>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>

<div id="confirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Are you sure you want to delete the selected show?</h2>
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
            window.location.href = '/shows/edit/' + id;
        } else {
            alert('Select a show to edit');
        }
    }

    function deleteSelected() {
        var selected = document.querySelector('input[name="selected"]:checked');
        if (selected) {
            var id = selected.value;
            var confirmModal = document.getElementById('confirmModal');
            confirmModal.classList.remove('hidden');

            document.getElementById('confirmYes').onclick = function() {
                window.location.href = '/shows/delete/' + id;
            };

            document.getElementById('confirmNo').onclick = function() {
                confirmModal.classList.add('hidden');
            };
        } else {
            alert('Select a show to delete');
        }
    }
</script>
</body>
</html>