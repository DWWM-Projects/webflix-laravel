<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'released_at' => 'datetime',
    ];

    protected function duration(): Attribute
    {
        return Attribute::make(function ($value) {
            $hours = floor($value / 60);
            $minutes = $value % 60;
            $minutes = $minutes < 10 ? '0'.$minutes : $minutes;

            return $hours .' h '. $minutes . 'min' ;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    


}
