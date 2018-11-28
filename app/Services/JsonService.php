<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 9:37 PM
 */

namespace App\Services;


class JsonService
{
    public $column;
    public $languages;

    public function __construct(LanguagesService $languagesService)
    {
        $this->languages = $languagesService;
    }
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

    public function createLangString($request, $column, $model)
    {
        $languages = $this->languages->getActiveLanguages();

        foreach ($languages as $key => $language){
            if ($key == 1){
                $items = [$language => $request->get($column.':'.$language)];
            }else{
                $items[$language] = $request->get($column.':'.$language);
            }
        };
        $model->$column = json_encode($items);
        return $model;

    }
}