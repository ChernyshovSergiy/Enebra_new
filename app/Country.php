<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property-read \App\Language $language
 * @property-read \App\Image $image
 * @mixin \Eloquent
 */
class Country extends Model
{

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }

    public function flag_image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

    public static function getCountries($language_id)
    {
        return self::select('id')->where($language_id)->get();
    }

    public function idDocuments()
    {
        return $this->belongsToMany(
            Inf_id_document::class,
            'country_id_documents',
            'country_id',
            'document_id'
        );
        //$country->idDocuments //get all uses documents for own country
    }

    protected $fillable = [
        'name',
        'image_id',
//        'language_id'
    ];



    public function getLanguage()
    {
        return ($this->language != null)
            ? $this->language->title
            : 'don`t have language';
    }

    /**
     * @return string
     */
    public function getFlagImageCategoryId()
    {
        return ($this->flag_image != null)
            ? $this->flag_image->category_id
            : 'don`t have category';
    }

    public function getFlagImageIdTitle()
    {
        $category = ImageCategory::find($this->getFlagImageCategoryId());
        return ($category != null)
            ? $category->title
            : 'don`t have category';
    }

    public function getFlagImage()
    {
        $flag = Image::find($this->image_id);
        if ($flag == null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getFlagImageIdTitle() .'/'. $flag->image;
    }

    public function setFlagImage($id)
    {
        if ($id == null){
            return;
        }
        $this->image_id = $id;
        $this->save();
    }

    public function setLanguage($id)
    {
        if ($id == null){
            return;
        }
        $this->language_id = $id;
        $this->save();
    }

}
