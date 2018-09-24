<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Self_;

/**
 * @property  int img_id
 * @property int menu
 */
class Inf_page extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'sub_title',
        'description', 'top_textarea',
        'left_textarea', 'right_textarea',
        'img_id', 'menu', 'if_desc',
        'text_description', 'sort',
        'original', 'keywords', 'meta_desc',
        'meta_id', 'language_id'
    ];

    public function sluggable() //https://packagist.org/packages/cviebrock/eloquent-sluggable
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ]; // поле автоматически будет приведено в латиницу привет - privet и не будет дубликации привет - privet-1
    }

    public function images()
    {
        return $this->hasMany(Image::class,'id', 'img_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'id', 'language_id');
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

    public function setOriginal()
    {
        $this->original = 1;
        $this->save();
    }

    public function setTranslate()
    {
        $this->original = 0;
        $this->save();
    }

    public function toggleOriginal($value)
    {
        if ($value == null){
            return $this->setTranslate();
        }
        else
        {
            return $this->setOriginal();
        }
    }
}
