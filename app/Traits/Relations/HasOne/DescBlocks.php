<?php

namespace App\Traits\Relations\HasOne;

use App\Models\Desc_block;

trait DescBlocks{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function desc_block(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Desc_block::class, 'id', 'desc_block_id');
    }
}