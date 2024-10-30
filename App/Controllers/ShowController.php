<?php

namespace App\Controllers;

use App\Models\Show;

class ShowController
{
    // Método para mostrar todos los shows
    public function index()
    {
        $shows = Show::getAll();

        ob_start();
        require '../resources/views/shows/index.blade.php';
        return ob_get_clean();
    }

    public function create()
    {
        return view('shows/create');
    }

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

    public function edit($id)
    {
        if ($id=== null){
            header('location: /shows');
            exit;
        }

        $show = Show::find($id);
        if (!$show) {
            require '../resources/views/errors/404.blade.php';
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
        exit;
    }

    public function delete($id)
    {
        if($id === null) {
            header('location: /shows');
            exit;
        }
        $show = Show::find($id);

        if (!$show) {
            require '../resources/views/errors/404.blade.php';
            return;
        }
        return view('shows/delete', ['show' => $show]);
    }

    public function destroy($id)
    {
        Show::delete($id);
        header('Location: /shows');
        exit;
    }
}
