<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'models';

    protected $fillable = ['title_en', 'title_ar', 'brand_id'];

    public function title()
    {
        if (app()->getLocale() == 'ar') {
            return $this->title_ar;
        } elseif (app()->getLocale() == 'en') {
            return $this->title_en;
        }
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
