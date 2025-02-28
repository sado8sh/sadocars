<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cars extends Model
{
    protected $table = 'table_cars';
    protected $fillable = ['brand', 'model', 'category', 'year', '0-100km/h', '0-160km/h', '1/4mile', 'top_speed', 'engine', 'horsepower', 'torque', 'weight', 'seating', 'drive', 'transmission', 'price', 'performance', 'interior', 'main_image', 'second_image', 'performance_image', 'interior_image', 'video'];
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
