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
    public function index()
    {
        $social_links = SocialLink::build();
        $locale = LaravelLocalization::getCurrentLocale();

        return view('admin.Social_link.index', compact('social_links', 'locale'));
    }

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
        $social_link->url = json_encode($urls);
        $social_link->save();

        return redirect()->route('social_links.index');
    }

    public function show(SocialLink $socialLink)
    {
        //
    }

    public function edit($id)
    {
        $social_link = SocialLink::build()->find($id);
        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();
        $foot_icon_image = Image::where( 'category_id','=', 6 )->pluck('title', 'id');
        return view('admin.Social_link.edit', compact('social_link','languages', 'foot_icon_image'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'sort' => 'required',
            'image_id' => 'required'
        ]);
        $social_link = SocialLink::find($id);
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

        $social_link->url = json_encode($urls);
        $social_link->update($request->all());
        return redirect()->route('social_links.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        SocialLink::find($id)->delete();
        return redirect()->route('social_links.index');
    }

    public function toggle($id)
    {
        $point = SocialLink::find($id);
        $point->toggleActive();

        return redirect()->back();
    }
}
