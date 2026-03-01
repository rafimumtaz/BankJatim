<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function promos()
    {
        return $this->hasMany(Promo::class);
    }
}
