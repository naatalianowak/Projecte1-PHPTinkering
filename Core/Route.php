<?php
//Fitxer per gestionar les rutes
namespace Core;

use RuntimeException;

class Route
{
    //creem array en les rutes
    protected $routes = [];

    //creem funcio per afegir rutes a l'array
    public function register($route)
    {
        $this->routes[] = $route;
    }

    //funcio per rebre un array de rutes i assignar a la propietat routes
    public function define($route)
    {
        $this->routes = $route;
        return $this;
    }

    //funcio per redirigir la url solicitada a un controlador
    public function redirect($uri)
    {
        //partim la url
        $parts = explode('/', trim($uri,'/'));
        //indiquem ruta del controlador
        $controller = 'App\Controllers\FilmController';
        //indiquem la ruta de shows
        $controllerShow = 'App\Controllers\ShowController';

        //Inici (Landing page)
        if ($uri === '/' || $uri === '') {
            require '../App/Controllers/FilmController.php';
            require '../App/Controllers/ShowController.php';
            $controllerInstance = new $controller();
            $content = $controllerInstance->landing();
            
            $header = $this->getViewContent('../resources/views/layout/header.blade.php');
            $footer = $this->getViewContent('../resources/views/layout/footer.blade.php');
            
            echo $header . $content . $footer;
            return;
        }

        //Films
        if ($uri === '/films') {
            require '../App/Controllers/FilmController.php';
            $controllerInstance = new $controller();
            $content = $controllerInstance->index();
            
            $header = $this->getViewContent('../resources/views/layout/header.blade.php');
            $footer = $this->getViewContent('../resources/views/layout/footer.blade.php');
            
            echo $header . $content . $footer;
            return;
        }

        //Shows (placeholder, to be implemented)
        if ($uri === '/shows') {
            require '../App/Controllers/ShowController.php';
            $controllerInstance = new $controllerShow();
            $content = $controllerInstance->index(); // Asegúrate de que este método esté implementado correctamente
            $header = $this->getViewContent('../resources/views/layout/header.blade.php');
            $footer = $this->getViewContent('../resources/views/layout/footer.blade.php');
            
            echo $header . $content . $footer;
            return;
        }

        //create
        if($parts[0] === 'create') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->create();
        }
        //shows/create
        if($parts[0] === 'shows' && $parts[1] === 'create') {
            require '../App/Controllers/ShowController.php';
            //creem nova instancia
            $controllerInstance = new $controllerShow();
            return $controllerInstance->create();
        }

        //Utilitzant POST guardem
        if ($parts[0] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            return $controllerInstance->store($data);
        }
        //Utilitzant POST guardem
        if ($parts[0] === 'shows' && $parts[1] === 'store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/ShowController.php';
            //creem nova instancia
            $controllerInstance = new $controllerShow();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            return $controllerInstance->store($data);
        }


        //delete en GET  mirem que sigue delete en la id
        if ($parts[0] === 'delete' && isset($parts[1])) {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->delete($parts[1]);
        }
        //delete en GET  mirem que sigue delete en la id
        if ($parts[0] === 'shows' && $parts[1] === 'delete' && isset($parts[2])) {
            require '../App/Controllers/ShowController.php';
            //creem nova instancia
            $controllerInstance = new $controllerShow();
            return $controllerInstance->delete($parts[2]);
        }



        //destroy en POST
        if ($parts[0] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->destroy($_POST['id']);
        }
        //destroy en POST
        if ($parts[0] === 'shows' && $parts[1] === 'destroy' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/ShowController.php';
            //creem nova instancia
            $controllerInstance = new $controllerShow();
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->destroy($_POST['id']);
        }



        //edit en GET
        if($parts[0] === 'edit' && $parts[1]) {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            return $controllerInstance->edit($parts[1]);
        }
        //edit en GET
        if($parts[0] === 'shows' && $parts[1] === 'edit' && $parts[2]) {
            require '../App/Controllers/ShowController.php';
            //creem nova instancia
            $controllerInstance = new $controllerShow();
            return $controllerInstance->edit($parts[2]);
        }

        //Actualitzar en POST
        if ($parts[0] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/FilmController.php';
            //creem nova instancia
            $controllerInstance = new $controller();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->update($_POST['id'], $data);
        }
        //Actualitzar en POST
        if ($parts[0] === 'shows' && $parts[1] === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            require '../App/Controllers/ShowController.php';
            //creem nova instancia
            $controllerInstance = new $controllerShow();
            //creem variable per agafar les dades de la petició post
            $data = $_POST;
            //comprovem si pasen id
            if (!isset($_POST['id'])){
                throw new RuntimeException('No id provided');
            }
            return $controllerInstance->update($_POST['id'], $data);
        }

        //si no es cap dels anteriors retornem la vista 404
        return require '../resources/views/errors/404.blade.php';


//        //si ruta no existeix redirigim a vista d'error
//        if(!array_key_exists($uri, $this->routes)) {
//            require '../resources/views/errors/404.php';
//            return $this;
//        }
//
//        //si no troba el controlador
//        if (!file_exists($this->routes[$uri])) {
//            throw new RuntimeException("No s'ha trobat el controlador:". $this->routes[$uri]);
//        }
//
//        require $this->routes[$uri];
//        return $this;
    }

    private function getViewContent($path) {
        ob_start();
        include $path;
        return ob_get_clean();
    }

}
