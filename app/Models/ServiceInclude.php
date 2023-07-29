<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInclude extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function title()
    {
        if (app()->getLocale() == 'ar')
            return $this->title_ar;
        elseif (app()->getLocale() == 'en')
            return $this->title_en;
    }
}
