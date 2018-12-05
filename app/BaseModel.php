<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/26/18
 * Time: 12:41 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected $model;
    protected $select ='*';
    protected $column;


    public function build()
    {
        $model = $this->model;
        $select = $this->select;

        $result = $model->select($select);;
        if ($result->isEmpty()){
            return [];
        }
        $result->transform(function ($item){
            $column = $this->column;
            if (is_string($item->$column) &&
                is_object(json_decode($item->$column)) &&
                json_last_error() == JSON_ERROR_NONE){

                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        return $result;
    }
}