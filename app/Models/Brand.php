<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'is_active', 'is_popular'];
    public function brands()
    {
        return $this->hasMany(Course::class);
    }
}
