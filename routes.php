<?php
//definim les rutes
return [
    '/' => 'App/Controllers/FilmController@index',
    '/index.php' => 'App/Controllers/FilmController@index',
    '/index' => 'App/Controllers/FilmController@index',
    '/home' => 'App/Controllers/FilmController@index',
    '/create' => 'App/Controllers/FilmController@create',
    '/store' => 'App/Controllers/FilmController@store',
    '/edit' => 'App/Controllers/FilmController@edit',
    '/update' => 'App/Controllers/FilmController@update',
    '/delete' => 'App/Controllers/FilmController@delete',
    '/destroy' => 'App/Controllers/FilmController@destroy',

    '/shows' => 'App/Controllers/ShowController@index',
    '/shows/create' => 'App/Controllers/ShowController@create',
    '/shows/store' => 'App/Controllers/ShowController@store',
    '/shows/edit' => 'App/Controllers/ShowController@edit',
    '/shows/update' => 'App/Controllers/ShowController@update',
    '/shows/delete' => 'App/Controllers/ShowController@delete',
    '/shows/destroy' => 'App/Controllers/ShowController@destroy',
];
