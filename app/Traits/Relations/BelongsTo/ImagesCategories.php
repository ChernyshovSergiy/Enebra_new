<?php

namespace App\Traits\Relations\BelongsTo;

use App\Models\ImageCategory;

trait ImagesCategories{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image_category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ImageCategory::class, 'category_id', 'id');
    }
}