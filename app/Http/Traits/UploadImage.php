<?php

namespace App\Http\Traits;

trait UploadImage
{

    static public function uploadImage($path, $image)
    {
        $extention = strtolower($image->getClientOriginalExtension());
        $name = time() . rand(100, 999) . '.' . $extention;
        return $image->move($path, $name);
    }

}
