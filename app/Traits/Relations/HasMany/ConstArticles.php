<?php

namespace App\Traits\Relations\HasMany;

use App\Models\Const_article;

trait ConstArticles
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function const_articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Const_article::class, 'const_sections_id', 'id');
    }
}