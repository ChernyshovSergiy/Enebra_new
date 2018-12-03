<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 9:37 PM
 */

namespace App\Services;


use App\Traits\Methods\BuildJson;

class JsonService
{
    use BuildJson;

    public $column;
    public $languages;

    public function __construct(LanguagesService $languagesService)
    {
        $this->languages = $languagesService;
    }

    public function createLangString($request, $column, $model) :string
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