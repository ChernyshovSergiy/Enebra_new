<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property-read \App\Language $language
 * * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inf_id_document[] $id_documents
 * @property-read \App\Image $image
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $image_id
 * @property-read \App\Image $flag_image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inf_id_document[] $id_documents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUpdatedAt($value)
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

    public function id_documents()
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

    public static function add($fields)
    {
        $county = new static;
        $county->fill($fields);
        $county->save();

        return $county;
    }

    public function edit($fields) //edit(change) post
    {
        $this->fill($fields);
        $this->save();
    }

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

    public function setIdDocuments($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->id_documents()->sync($ids);
    }

    public function getIdDocumentsNames()
    {
        return (!$this->id_documents->isEmpty())
            ?   implode(', ', $this->id_documents->pluck('name')->all())
            :   'Теги отсутствуют';
    }

}
