<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class AdminRepo
{
    public static function search($query = '')
    {
        if ($query == '') {
            return AdminRepo::getAll();
        }

        $query = "%$query%";

        return DB::select("SELECT * FROM admins WHERE name LIKE ? OR email LIKE ?", [$query, $query]);
    }

    //getAll: static function
    public static function getAll()
    {
        $query = 'SELECT * FROM admins';

        return DB::select($query);
    }

    public static function getById($id)
    {
        $query = 'SELECT * FROM admins WHERE id = ?';

        return DB::selectOne($query, [ $id ]);
    }

    public static function insert($name, $email, $password): int
    {
        $query = 'INSERT INTO admins (name, email, password) VALUES (?, ?, ?)';

        DB::insert($query, [ $name, $email, $password ]);

        return DB::getPdo()->lastInsertId();
    }

    public static function update($id, $name, $email, $password)
    {
        $query = 'UPDATE admins SET name = ?, email = ?, password = ? WHERE id = ?';

        return DB::update($query, [ $name, $email, $password, $id ]);
    }

    public static function delete($id)
    {
        $query = 'DELETE FROM admins WHERE id = ?';

        return DB::delete($query, [ $id ]);
    }
}

