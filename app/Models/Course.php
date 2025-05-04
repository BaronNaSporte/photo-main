<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course  extends Model
{
    use HasFactory;

    protected $table = 'courses';

     protected $fillable = [
        'name',
        'description',
        'brand_id',
        'image',
        'is_active',
        'is_new',
        'is_popular'
    ];

     public function brand()
     {
        return $this->belongsTo(Brand::class);
     }

     public function cart()
     {
        return $this->hasMany(Cart::class);
     }
}
