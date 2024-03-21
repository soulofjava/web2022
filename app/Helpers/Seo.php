<?php

namespace App\Helpers;

use App\Models\Website;
use Artesaos\SEOTools\Facades\SEOMeta;

class Seo
{

    public static function seO()
    {
        $data = Website::all()->first();
        return SEOMeta::setTitle($data->web_name)
            ->setDescription($data->web_description)
            ->addKeyword('PesonaFM')
            ->addKeyword('Wonosobo')
            ->addKeyword('Soul Of Java')
            ->addMeta('author', 'Isa Maulana Tantra');
    }
}
