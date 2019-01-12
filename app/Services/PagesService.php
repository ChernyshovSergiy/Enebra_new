<?php
/**
 * Created by PhpStorm.
 * User: enebra
 * Date: 11/27/18
 * Time: 3:10 PM
 */

namespace App\Services;

use App\Traits\Methods\GetTitleFromMenu;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PagesService
{
    use GetTitleFromMenu;

    public function getDirectPageName($id): string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $title = $this->getActiveDirectTitleMenuPoint($id);
        return ($title !== '') ? json_decode($title)->$locale :'';
    }

    public function getActivePagesName(): array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $titles = $this->getActiveTitleMenuPoints();
        $page_names = [];
        foreach($titles as $key => $title){
            $page_names[$key] = json_decode($title)->$locale;
        }
        return $page_names;
    }
}