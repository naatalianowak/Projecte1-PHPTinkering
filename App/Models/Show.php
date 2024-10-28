<?php

namespace App\Models;

use Core\App;

class Show
{
    protected static $table = 'shows';

    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(array('id' => $id));
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO '. static::$table . "(title, year, episodes, platform, protagonist) VALUES (:title, :year, :episodes, :platform, :protagonist)");
        $statement->bindValue(':title', $data['title']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':episodes', $data['episodes']);
        $statement->bindValue(':platform', $data['platform']);
        $statement->bindValue(':protagonist', $data['protagonist']);
        $statement->execute();
    }
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE ". static::$table . " SET title = :title, year = :year, episodes = :episodes, platform = :platform, protagonist = :protagonist WHERE id = :id");
        $statement->bindValue(':id', $id);
        $statement->bindValue(':title', $data['title']);
        $statement->bindValue(':year', $data['year']);
        $statement->bindValue(':episodes', $data['episodes']);
        $statement->bindValue(':platform', $data['platform']);
        $statement->bindValue(':protagonist', $data['protagonist']);
        $statement->execute();
    }
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM '. static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}
