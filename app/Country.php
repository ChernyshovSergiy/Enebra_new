<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\BelongsTo\Languages_id;
use App\Traits\Relations\BelongsToMany\Id_documents;
use App\Traits\Relations\HasOne\Images;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Country
 *
 * @property int $id
 * @property string $name
 * @property int $language_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inf_id_document[] $id_documents
 * @property-read \App\Image $images
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    use BuildJson, Languages_id, Images, Id_documents;


    protected $fillable = [
        'name',
        'image_id'
    ];

    public static function addCountry($fields) :void
    {
        $country = new static;
        $country->fill($fields->all());
        $country->setLanguage($fields->get('language_id'));
        $country->setFlagImage($fields->get('image_id'));
        $country->setIdDocuments($fields->get('id_documents'));
        $country->save();
    }

    public function editCountry($fields) :void //edit(change) post
    {
        $this->fill($fields->all());
        $this->setLanguage($fields->get('language_id'));
        $this->setFlagImage($fields->get('image_id'));
        $this->setIdDocuments($fields->get('id_documents'));
        $this->update($fields->all());
    }

    public function getLanguage() :string
    {
        return ($this->language != null)
            ? $this->language->title
            : 'don`t have language';
    }

    public function getFlagImageCategoryId() :string
    {
        return ($this->images != null)
            ? $this->images->category_id
            : 'don`t have category';
    }

    public function getFlagImageIdTitle() :string
    {
        $category = ImageCategory::find($this->getFlagImageCategoryId());
        return ($category != null)
            ? $category->title
            : 'don`t have category';
    }

    public function getFlagImage() :string
    {
        $flag = Image::find($this->image_id);
        if ($flag == null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getFlagImageIdTitle() .'/'. $flag->image;
    }

    public function setFlagImage($id) :void
    {
        if ($id == null){
            return;
        }
        $this->image_id = $id;
        $this->save();
    }

    public function setLanguage($id) :void
    {
        if ($id == null){
            return;
        }
        $this->language_id = $id;
        $this->save();
    }

    public function setIdDocuments($ids) :void
    {
        if ($ids == null) {
            return;
        }
        $this->id_documents()->sync($ids);
    }

    public function getIdDocumentsNames() :string
    {
        $locale = LaravelLocalization::getCurrentLocale();
        if (!$this->id_documents->isEmpty()){
            $id_docs = Inf_id_document::getModel();
            $id_docs = $this->build($id_docs, 'name')
                ->whereIn('id', $this->id_documents->pluck('id')->all())
                ->pluck('name')->pluck($locale);
            $doc_names = [];
            foreach($id_docs as $key => $title){
                $doc_names[$key] = $title;
            };
            $doc_names = implode(', ', $doc_names);
            return $doc_names;
        }
        return '';
    }

    public function getIdDocNameByCurrentLocale() :array
    {
        $locale = LaravelLocalization::getCurrentLocale();
        $id_docs = Inf_id_document::getModel();
        $id_docs = $this->build($id_docs, 'name')->pluck('name', 'id');
        $id_documents = [];
        foreach($id_docs as $key => $title){
            $id_documents[$key] = $title->$locale;
        };
        return $id_documents;
    }

    public function removeCountry() :void
    {
        $this->delete();
    }

}
