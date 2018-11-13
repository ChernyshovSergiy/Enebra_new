<?php

namespace App\Repositories;

use App\SocialLink;

class SocialLinksRepository extends Repository
{
    public function __construct(SocialLink $socialLink)
    {
        $this->model = $socialLink;
        $this->json_column_name = 'url';
    }
}