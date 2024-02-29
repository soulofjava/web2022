<?php

namespace App\Helpers;

use App\Models\Website;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class Seo
{
    public static function seO()
    {
        $data = Website::all()->first();
        return SEOMeta::setTitle($data->web_name)
            ->setDescription($data->web_name)
            ->setKeywords($data->web_name)
            ->addMeta('author', 'Isa Maulana Tantra');
    }
}
