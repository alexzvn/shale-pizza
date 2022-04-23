<?php

namespace App\Repositories;

use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodRepo
{
    public static function getAll($search = '')
    {

        if($search == ''){
            return DB::select('SELECT * FROM food');
        }
        else{
            $search = "%$search%";

        return DB::select("SELECT * FROM food WHERE name LIKE ?",[$search]);
        }
    }

    public static function getAllWithCategory($search = '')
    {
        $sql = 'select f.*, c.name as categoryName ';
        $sql .= 'from food as f ';
        $sql .= 'join categories as c on f.category_Id = c.id ';
        $sql .= 'order by f.name ';

        // $sql = 'SELECT food.* , categories.name as categoryName FROM food JOIN categories on food.category_id = categories.id ORDER BY food.name';
        $params = [];
        
        if($search='') {
            $search = "%$search%";
            $params = [$search, $search];
        }
        
        return DB::select($sql, $params);
    }

    public static function getById($id){
        $sql = 'SELECT * FROM food WHERE id = ?';

        return DB::selectOne($sql, [$id]);
    }

    public static function insert($name, $price, $image, $description, $category_id)
    {
        $sql = 'INSERT INTO food (name, price, image, description, category_id) VALUES (?,?,?,?,?)';

        DB::insert($sql,[$name, $price, $image, $description, $category_id]);

        return DB::getPdo()->lastInsertId();
    }

    public static function update($id, $name, $price, $image, $description, $category_id)
    {
        $sql = 'UPDATE food SET name = ?, price = ?, image = ?, description = ?, category_id = ? WHERE id = ?';

        return DB::update($sql, [ $name, $price, $image, $description, $category_id, $id ]);
    }

    public static function delete($id)
    {
        $sql = 'DELETE FROM food WHERE id = ?';

        return DB::delete($sql, [ $id ]);
    }
}