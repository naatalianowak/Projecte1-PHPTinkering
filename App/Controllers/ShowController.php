<?php

namespace App\Controllers;

use App\Models\Show;

class ShowController
{
    // Método para mostrar todos los shows
    public function index()
    {
        // Obtener todas las series
        $shows = Show::getAll();

        // Cargar la vista de índice de series y pasar las series
        ob_start();
        require '../resources/views/shows/index.blade.php'; // Asegúrate de que esta vista exista
        return ob_get_clean();
    }

    // Método para mostrar el formulario de creación de un nuevo show
    public function create()
    {
        return view('shows/create');
    }

    // Método para almacenar un nuevo show en la base de datos
    public function store()
    {
        $data = [
            'title' => $_POST['title'],
            'year' => $_POST['year'],
            'episodes' => $_POST['episodes'],
            'platform' => $_POST['platform'],
            'protagonist' => $_POST['protagonist']
        ];

        Show::create($data);
        header('Location: /shows');
        
    }

    // Método para mostrar el formulario de edición de un show existente
    public function edit($id)
    {
        if ($id=== null){
            header('location: /shows');
            exit;
        }

        $show = Show::find($id);
        if (!$show) {
            require '../resources/views/errors/404.blade.php'; // Mostrar error 404 si no se encuentra el show
            return;
        }
        return view('shows/edit', ['show' => $show]);
    }

    // Método para actualizar un show existente en la base de datos
    public function update($id)
    {
        $data = [
            'title' => $_POST['title'],
            'year' => $_POST['year'],
            'episodes' => $_POST['episodes'],
            'platform' => $_POST['platform'],
            'protagonist' => $_POST['protagonist']
        ];

        Show::update($id, $data);
        header('Location: /shows');
        exit; // Asegúrate de salir después de redirigir
    }

    // Método para mostrar la confirmación de eliminación de un show
    public function delete($id)
    {
        if($id === null) {
            header('location: /shows');
            exit;
        }
        $show = Show::find($id);

        if (!$show) {
            require '../resources/views/errors/404.blade.php'; // Mostrar error 404 si no se encuentra el show
            return;
        }
        return view('shows/delete', ['show' => $show]);
    }

    // Método para eliminar un show de la base de datos
    public function destroy($id)
    {
        Show::delete($id);
        header('Location: /shows');
        exit; // Asegúrate de salir después de redirigir
    }
}
