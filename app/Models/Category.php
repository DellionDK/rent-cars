<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'name_en',
        'url',
        'position'
    ];

    public function cars() {
        return $this->hasMany(Car::class, 'category_id');
    }

}
