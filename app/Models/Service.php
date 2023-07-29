<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function car_size()
    {
        return $this->belongsTo(CarSize::class);
    }

    public function title()
    {
        if (app()->getLocale() == 'ar')
            return $this->title_ar;
        elseif (app()->getLocale() == 'en')
            return $this->title_en;
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function includes()
    {
        return $this->hasMany(ServiceInclude::class);
    }
}
