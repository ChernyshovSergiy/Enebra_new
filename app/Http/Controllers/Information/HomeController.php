<?php

namespace App\Http\Controllers\Information;

use App\Inf_introduction;
use App\Inf_introduction_point;
use App\Language;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function index()
    {
        $status = ' ';
        $cur_lang = LaravelLocalization::getCurrentLocale();
        $langId = Language::where('slug', $cur_lang)->firstOrFail();
        $id = $langId->id;
        $introduction = Inf_introduction::where('language_id', $id)->firstOrFail();
        $introduction_points = Inf_introduction_point::where('language_id', $id)->get()->sortBy('sort');
        return view('Information.index', compact('status', 'introduction', 'introduction_points'));
    }
}
