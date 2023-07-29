<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSize extends Model
{
    use HasFactory;

    protected  $fillable = ['title_ar', 'title_en'];

    public function title()
    {
        if (app()->getLocale() == 'ar') {
            return $this->title_ar;
        } elseif (app()->getLocale() == 'en') {
            return $this->title_en;
        }
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function material() {
        return $this->hasManyThrough(Material::class, Service::class);
    }
}
