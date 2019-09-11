<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ImageCategory
 *
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ImageCategory extends Model
{
    protected $fillable = [
        'title'
    ];

    public function updateImageCategory($request, $id):void
    {
        $image_category = self::find($id);
        $image_category->fill($request->all());
        $image_category->update($request->all());
    }

    public function removeImageCategory($id):void
    {
        self::find($id)->delete();
    }

    public function getCategoryNames() :array
    {
        return self::pluck('title', 'id')->all();
    }
}
