<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


/**
 * @property  int img_id
 * @property int menu
 * @property mixed language
 */
class Inf_page extends Model
{
//    use Sluggable;

    protected $fillable = [
        'title_id','user_id', 'sub_title',
        'description', 'top_textarea',
        'left_textarea', 'right_textarea',
        'img_id', 'menu', 'if_desc',
        'text_description', 'sort',
        'original', 'keywords', 'meta_desc',
        'meta_id', 'language_id'
    ];

    protected $casts = [
        'id' => 'int',
        'text' => 'array'
    ];




    public function images()
    {
        return $this->hasMany(Image::class,'id', 'image_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'original', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function title()
    {
        return $this->hasOne(Menu::class, 'id', 'title_id');
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
        $page->fill($fields);
        $page->save();

        return $page;
    }

    public function editPage($fields) //edit(change) page
    {
        $this->fill($fields);
        $this->save();
    }

    public function removePage() //delete page
    {
        $this->delete();
    }

    public function setImg_id($ids)
    {
        if($ids == null){
            return;
        }

        $this->images()->sync($ids);
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

    public function getImageCategoryId()
    {
        return ($this->image != null)
            ? $this->image->category_id
            : 'don`t have category';
    }

    public function getImageIdTitle()
    {
        $category = ImageCategory::find($this->getImageCategoryId());
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
        return '/uploads/'. $this->getImageIdTitle() .'/'. $this->image->image;
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
            ? $this->title->title
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

//    public function getDescription(){
//        $desc = Inf_page::where('text', 'description')->get();
//        dd($desc);
//    }
}
