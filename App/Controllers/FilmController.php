<?php

namespace App\Controllers;

use App\Models\Film;

class FilmController
{
    //funcio index
    public function index()
    {
        // Obtener todas las películas
        $films = Film::getAll();

        ob_start();
        require '../resources/views/films/index.blade.php';
        return ob_get_clean();
    }

    //funcio per anar a la vista create
    public function create()
    {
        return view('films/create');
    }

    //funcio per guardar les dades i tornar a la vista principal
    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'director' => $_POST['director'],
            'year' => $_POST['year'],
            'genre' => $_POST['genre']
        ];

        Film::create($data);
        header('Location: /');
    }

   //funcio per a la vista edit
    public function edit($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /');
            exit;
        }

        //busquem la peli
        $film = Film::find($id);

        //si no ens passen cap peli mostrar 404
        if (!$film) {
            require '../../resources/views/errors/404.blade.php';
            return;
        }

        //retornem la vista i li passem la peli indicada
        return view('films/edit', ['film' => $film]);
    }

    //funcio update per a modificar la peli a la base de dades
    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'director' => $_POST['director'],
            'year' => $_POST['year'],
            'genre' => $_POST['genre']
        ];

        Film::update($id, $data);
        header('Location: /');
    }

    //funcio per anar a la vista delete
    public function delete($id)
    {
        //si no ens passen la id fem redirect
        if ($id === null) {
            header('location: /');
            exit;
        }

        //busquem la peli
        $film = Film::find($id);

        if (!$film) {
            return view('errors.404');
        }
        //retornem la vista en la peli
        return view('films/delete', ['film' => $film]);

    }

    //funcio per eliminar la peli de la base de dades
    public function destroy($id)
    {
        //utilizem la funcio delete del model
        Film::delete($id);

        //retornar a la vista
        header('location: /');
    }

    public function landing()
    {
        // Obtener todas las películas
        $films = Film::getAll();

        // Cargar la vista de landing y pasar las películas
        ob_start();
        require '../resources/views/landing.blade.php';
        return ob_get_clean();
    }

}
