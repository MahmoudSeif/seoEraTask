<?php

namespace App;

class Language extends Model
{
    use GetImageTrait;

    const UPLOAD_FOLDER = '/languages/';

    protected $appends = ['image_path'];
}
