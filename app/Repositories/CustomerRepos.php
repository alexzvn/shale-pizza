<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CustomerRepos
{
    public static function getAll()
    {
        $query ='SELECT * FROM customers';

        return DB::select($query);
    }

    public static function getById($id)
    {
        $query = 'SELECT * FROM customers WHERE id = ?';

        return DB::selectOne($query, [$id]);
    }

    public static function insert($name, $email, $phone, $address, $country, $gender): int
    {
        $query = 'INSERT INTO customers (name, email, phone, address, country, gender) VALUES (?, ?, ?, ?, ?, ?)';

        DB::insert($query, [$name, $email, $phone, $address, $country, $gender ]);

        return DB::getPdo()->lastInsertId();
    }

    public static function update($id, $name, $email, $phone, $address, $country, $gender)
    {
        $query ='UPDATE customers SET name =?, email = ?, phone = ?, address = ?, country = ?, gender = ? WHERE id = ?';

        return DB::update($query, [$name, $email, $phone, $address, $country, $gender, $id ]);
    }

    public static function delete($id)
    {
        $query = 'DELETE FROM customers WHERE id = ?';

        return DB::delete($query, [$id]);
    }
}