<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['title_en', 'title_ar'];
    public function title()
    {
        if (app()->getLocale() == 'ar') {
            return $this->title_ar;
        } elseif (app()->getLocale() == 'en') {
            return $this->title_en;
        }
    }
}
