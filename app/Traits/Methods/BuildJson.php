<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/28/18
 * Time: 4:59 PM
 */

namespace App\Traits\Methods;


trait BuildJson
{
    public $column;
    public function build($model, $column)
    {
        $this->column = $column;
        $result = $model->get();
        if ($result->isEmpty()){
            return [];
        }
        $result->transform(function ($item){
            $column = $this->column;
            if (is_string($item->$column) && is_object(json_decode($item->$column)) && json_last_error() == JSON_ERROR_NONE){
                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        return $result;
    }
}