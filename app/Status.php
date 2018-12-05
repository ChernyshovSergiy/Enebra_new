<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Status
 *
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    public static function getStatuses()
    {
        return self::select('id')->get();
    }
}
