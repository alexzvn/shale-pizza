<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepos
{
    public static function getAll()
    {
        $query ='SELECT * FROM categories';

        return DB::select($query);
    }

    public static function getById($id)
    {
        $query = 'SELECT * FROM categories WHERE id = ?';

        return DB::selectOne($query, [ $id ]);
    }

    public static function insert($name)
    {
        $query = 'INSERT INTO categories (name) VALUES (?)';
        DB::insert($query, [$name]);

        return DB::getPdo()->lastInsertId();
    }

    public static function updates($id, $name)
     {
         $query = 'UPDATE categories SET name = ?, WHERE id = ?';

         return DB::update($query, [$name]);
     }

     public static function delete($id)
     {
         $query = 'DELETE FROM categories WHERE id = ?';

         return DB::delete($query, [$id]);
     }

}