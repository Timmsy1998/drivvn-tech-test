<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Colour;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['make', 'model', 'build_date', 'colour_id'];

    public function colour()
    {
        return $this->belongsTo(Colour::class);
    }
}
