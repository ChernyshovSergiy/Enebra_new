<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Language;
use App\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SocialLinkController extends Controller
{
//    protected $model = false;

    public function index()
    {
        $social_links = SocialLink::all();
        $social_links->transform(function ($social_link, $key) {
                $social_link->url = json_decode($social_link->url);
                return $social_link;
            });
//        return $social_links;

//                $urls[] = $social_link->fillJsonAttribute('url', 'ru');

//        dd(gettype($social_links));

//            return $social_links;
//        });
//        return $social_links;


//        $cur_lang = LaravelLocalization::getCurrentLocale();


//        $users = SocialLink::where('url', 'like', '%"ru"%')->get();
//        foreach ($social_links as $social_link) {
//                $url[] = $social_link->url;
////                $urls[] = $social_link->fillJsonAttribute('url', 'ru');
//
//
//        }

//        $url = $social_links->url->ru;
//        if ($social_links == null) {
//            return false;
//        }
//        $social_links->transform(function ($item, $key){
//            $item->url= jason_decode($item->url);
//            return $item;
//        });
//        return $social_links;
//        $social_links->checkJson($social_links);
//        $cur_lang = LaravelLocalization::getCurrentLocale();
//        $social_links->url->toArray();
        dd($social_links);
        return view('admin.Social_link.index', compact('social_links'));
    }
//    protected function check($result)
//    {
//        if ($result->isEmpty()){
//            return false;
//        }
//        $result->transform(function ($item, $key){
//            if (is_string($item->url) && is_object(json_decode($item->url)) && json_last_error() == JSON_ERROR_NONE){
//                $item->url = json_decode($item->url);
//            }
//            return $item;
//        });
//        dd($result);
//        return $result;
//    }
//
//    public function get($select = '*', $take = false, $pagination = false, $where = false)
//    {
//        $builder = $this->model->select($select);
//        if ($take){
//            $builder->take($take);
//        }
//
//        if ($where){
//            $builder->where($where[0], $where[1]);
//        }
//
//        if ($pagination){
//            return $this->check($builder->paginate(Config::get('settings.paginate')));
//        }
//
//        return $this->check($builder->get());
//    }

    public function create()
    {
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();
        $foot_icon_image = Image::where( 'category_id','=', 6 )->pluck('title', 'id');
        return view('admin.Social_link.create', compact('languages', 'foot_icon_image'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'sort' => 'required',
            'image_id' => 'required'
        ]);
        $social_link = SocialLink::add($request->all());
        $social_link -> setImage($request->get('image_id'));

        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();

        foreach ($languages as $key => $language){
            if ($key == 1){
                $urls = [$language => $request->get('url'.':'.$language)];
            }else{
                $urls[$language] = $request->get('url'.':'.$language);
            }
        };
//        $social_link->url = json_encode($urls);
        $social_link->url = $urls;
        dd($social_link->url);
        $social_link->save();

        return redirect()->route('social_links.index');
    }

    public function show(SocialLink $socialLink)
    {
        //
    }

    public function edit(SocialLink $socialLink)
    {
        //
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        //
    }

    public function destroy(SocialLink $socialLink)
    {
        //
    }

    public function toggle($id)
    {
        $point = SocialLink::find($id);
        $point->toggleActive();

        return redirect()->back();
    }
}
