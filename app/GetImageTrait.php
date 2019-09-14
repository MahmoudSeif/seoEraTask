<?php
namespace App;

/**
 * Class GetImageTrait
 * @package Http\Model
 */
trait GetImageTrait
{
    /**
     * @param $value
     * @return string
     */
    public function getImagePathAttribute()
    {
        if (!$this->attributes['img']) {
            return null;
        }
        $main_upload_folder = config('seoEra.main_upload_folder');
        $class =__CLASS__;
        $user_folder = $class::UPLOAD_FOLDER;
        $image_path = $main_upload_folder.$user_folder.$this->attributes['img'];

        return asset($image_path);
    }
}
