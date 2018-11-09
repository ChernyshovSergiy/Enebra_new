<?php

namespace App\Repositories;

use App\socialLink;
use Config;

abstract class Repository
{
    protected $model = false;

    public function get($select = '*', $take = false, $pagination = false, $where = false)
    {
        $builder = $this->model->select($select);
        if ($take){
            $builder->take($take);
        }

        if ($where){
            $builder->where($where[0], $where[1]);
        }

        if ($pagination){
            return $this->check($builder->paginate(Config::get('settings.paginate')));
        }

        return $this->check($builder->get());
    }

    protected function check($result)
    {
        if ($result->isEmpty()){
            return socialLink::all();
        }
        $result->transform(function ($item, $key){
            if (is_string($item->url) && is_object(json_decode($item->url)) && json_last_error() == JSON_ERROR_NONE){
                $item->url = json_decode($item->url);
            }
            return $item;
        });
//        dd($result);
        return $result;
    }

//    public function one($alias, $attr = array())
//    {
//        $result = $this->model->where('alias', $alias)->first();
//
//        return $result;
//    }
}
