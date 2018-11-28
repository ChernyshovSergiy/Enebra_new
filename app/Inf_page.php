<?php

namespace App;

use App\Services\LanguagesService;
use App\Traits\Relations\BelongsTo\Languages;
use App\Traits\Relations\HasOne\Images;
use App\Traits\Relations\HasOne\Titles;
use App\Traits\Relations\HasOne\Users;
use Illuminate\Database\Eloquent\Model;
use Lang;


class Inf_page extends Model
{
    use Images, Languages, Users, Titles;

//    public $languages;
//
//    public function __construct(LanguagesService $languagesService)
//    {
//        $this->languages = $languagesService;
//    }


    protected $fillable = [
        'title_id','user_id',
        'image_id', 'menu', 'if_desc',
        'sort', 'original',
        'meta_id', 'text'
    ];

    protected $text_blocks = [
        'sub_title',
        'description',
        'top_textarea',
        'left_textarea',
        'right_textarea',
        'text_description',
        'keywords',
        'meta_desc',
    ];

    /**
     * @return array
     */
    public static function getTextColumnsForTranslate()
    {
        $page = new static;
        $page->text_blocks;
        return $page->text_blocks;
    }

    public function getUser($id){
        if ($id ==null){
            return;
        }
        $this->user_id = $id;
        $this->save();
    }

    public static function addPage( $fields) //add new page
    {
        $page = new static;
        $page->fill($fields->all());
        $page->setImage($fields->get('image_id'));
        $page->text = $page->setJson($fields);
        $page->save();

        return $page;
    }

    public function editPage($fields) //edit(change) page
    {
        $this->fill($fields->all());
        $this->setImage($fields->get('image_id'));
        $this->text = $this->setJson($fields);
        $this->update($fields->all());
    }

    public function removePage() //delete page
    {
        $this->delete();
    }

    public function setInMenu()
    {
        $this->menu = 1;
        $this->save();
    }

    public function delFromMenu()
    {
        $this->menu = 0;
        $this->save();
    }

    public function toggleMenuPoint($value)
    {
        if ($value == null){
            return $this->delFromMenu();
        }
        else
        {
            return $this->setInMenu();
        }
    }

    public function getImageCategoryTitle($id)
    {
        $category = ImageCategory::find($id);
        return ($category != null)
            ? $category->title
            : 'don`t have category';
    }

    public function getImage()
    {
        $image = Image::find($this->image_id);
        if ($image == null){
            return '/img/no-image.png';
        }

        return '/uploads/'. $this->getImageCategoryTitle($image->category_id) .'/'. $image->image;
    }

    public function setImage($id)
    {
        if ($id == null){
            return;
        }
        $this->image_id = $id;
        $this->save();
    }


    public function getLanguage()
    {
        return ($this->language != null)
            ? $this->language->title
            : 'don`t have language';
    }

    public function setLanguage($id)
    {
        if ($id == null){
            return;
        }
        $this->original = $id;
        $this->save();
    }

    public function getTitle()
    {
        return ($this->title != null)
            ? Lang::get('nav.'.$this->title->title)
            : 'don`t have language';
    }

    public function setTitle($id)
    {
        if ($id == null){
            return;
        }
        $this->title_id = $id;
        $this->save();
    }

    public static function build()
    {
        $result = Inf_page::all();
        if ($result->isEmpty()){
            return [];
        }
        $result->transform(function ($item){
            $column = 'text';
            if (is_string($item->$column) &&
                is_object(json_decode($item->$column)) &&
                json_last_error() == JSON_ERROR_NONE){

                $item->$column = json_decode($item->$column);
            }
            return $item;
        });
        return $result;
    }


    public function setJson($request)
    {
//        $languages = $this->languages->getActiveLanguages();

        $languages = Language::where('is_active', '=','1')
            ->pluck( 'slug', 'id')->all();

        $text_blocks = $this->text_blocks;
        $text = array();
        $lang = array();
        foreach ($text_blocks as $block) {
            foreach ($languages as $key => $language) {
                if ($key == 1) {
                    $lang = [$language => $request->get($block . ':' . $language)];
                } else {
                    $lang[$language] = $request->get($block . ':' . $language);
                }
            }
            $text = array_add($text, $block, $lang);
        }
        $text = json_encode($text);
        return $text;
    }
}
