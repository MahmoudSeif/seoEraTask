<?php

namespace App;

class Product extends Model
{
    use GetImageTrait;

    const UPLOAD_FOLDER = '/products/';

    protected $appends = ['image_path'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
