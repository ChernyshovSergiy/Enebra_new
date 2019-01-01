<?php

namespace App;

use App\Traits\Methods\BuildJson;
use App\Traits\Relations\BelongsTo\Images;
use App\Traits\Relations\HasOne\DescBlocks;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Description
 *
 * @property int $id
 * @property mixed|null $content
 * @property int $desc_block_id
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Desc_block $desc_block
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereDescBlockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $image_id
 * @property int $shadow
 * @property int|null $in_image_id_1
 * @property int|null $in_image_id_2
 * @property-read \App\Image|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereInImageId1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereInImageId2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Description whereShadow($value)
 */
class Description extends Model
{
    use DescBlocks, Images, BuildJson;

    protected $fillable = [
        'content',
        'desc_block_id',
        'image_id',
        'shadow',
        'in_image_id_1',
        'in_image_id_2',
        'sort'
    ];
    public $text_blocks = [
        'title',
        'sub_title',
        'italic_text',
        'bold_text',
        'regular_text',
        'image_text_1',
        'image_text_2',
        'link_text',
        'link',
    ];

    public function getTextColumnsForTranslate() :array
    {
        return (new static)->text_blocks;
    }

    public function getBlockTitle():string
    {
        return ($this->desc_block_id !== null)
            ? $this->desc_block->title
            : '';
    }

    public function getBGImage(): string
    {
        $image = Image::find($this->image_id);
        if ($image === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $image->image_category->title .'/'. $image->image;
    }

    public function getImageIn1(): string
    {
        $image = Image::find($this->in_image_id_1);
        if ($image === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $image->image_category->title .'/'. $image->image;
    }

    public function getImageIn2(): string
    {
        $image = Image::find($this->in_image_id_2);
        if ($image === null){
            return '/img/no-image.png';
        }
        return '/uploads/'. $image->image_category->title .'/'. $image->image;
    }

    public function addNewTextBlock($fields):void
    {
        $textBlock = new static;
        $textBlock->fill($fields->all());
        $textBlock->content = $textBlock->setJson($fields, $textBlock->text_blocks);
        $textBlock->save();
    }

    public function editTextBlock($fields, $id):void
    {
        $textBlock = self::find($id);
        $textBlock->fill($fields->all());
        $textBlock->content = $textBlock->setJson($fields, $textBlock->text_blocks);
        $textBlock->update($fields->all());
    }

    public function removeTextBlock($id):void
    {
        self::find($id)->delete();
    }
}
