<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\BelongsTo\Languages;
use App\Traits\Relations\HasOne\Images;
use App\Traits\Relations\HasOne\Titles;
use App\Traits\Relations\HasOne\Users;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * App\Inf_page
 *
 * @property int $id
 * @property int $user_id
 * @property int $title_id
 * @property mixed|null $text
 * @property int $views_count
 * @property int|null $image_id
 * @property int $menu
 * @property int $if_desc
 * @property int|null $sort
 * @property int $original
 * @property int $meta_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Image $images
 * @property-read \App\Language $language
 * @property-read \App\Menu $title
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereIfDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereMenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereTitleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inf_page whereViewsCount($value)
 * @mixin \Eloquent
 */
class Inf_page extends Model
{
    use Images, Languages, Users, Titles, BuildJson;

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

    public static function getTextColumnsForTranslate() :array
    {
        return (new static)->text_blocks;
    }

    public function getUser($id): void
    {
        if ($id === null){
            return;
        }
        $this->user_id = $id;
        $this->save();
    }

    public static function addPage( $fields) :void //add new page
    {
        $page = new static;
        $page->fill($fields->all());
        $page->setImage($fields->get('image_id'));
        $page->text = $page->setJson($fields, $page->text_blocks);
        $page->save();
    }

    public function editPage($fields) :void //edit(change) page
    {
        $this->fill($fields->all());
        $this->setImage($fields->get('image_id'));
        $this->text = $this->setJson($fields, $this->text_blocks);
        $this->update($fields->all());
    }

    public function removePage() :void //delete page
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
        if ($value === null){
            return $this->delFromMenu();
        }

        return $this->setInMenu();
    }

    public function getImageCategoryTitle($id)
    {
        $category = ImageCategory::find($id);
        return ($category !== null)
            ? $category->title
            : 'don`t have category';
    }

    public function getImage(): string
    {
        $image = Image::find($this->image_id);
        if ($image === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $this->getImageCategoryTitle($image->category_id) .'/'. $image->image;
    }

    public function setImage($id): void
    {
        if ($id === null){
            return;
        }
        $this->image_id = $id;
        $this->save();
    }

    public function getLanguage(): string
    {
        return ($this->language !== null)
            ? $this->language->title
            : 'don`t have language';
    }

    public function setLanguage($id): void
    {
        if ($id === null){
            return;
        }
        $this->original = $id;
        $this->save();
    }

    public function getTitle()
    {
        $locale = LaravelLocalization::getCurrentLocale();
        return ($this->title !== null)
            ? json_decode($this->title->title)->$locale
            : '';
    }

    public function setTitle($id): void
    {
        if ($id === null){
            return;
        }
        $this->title_id = $id;
        $this->save();
    }
}
