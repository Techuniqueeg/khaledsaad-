<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $hidden = ['updated_at', 'created_at'];
    public function getImageAttribute($image)
    {
        return asset('') .  $image;
    }

}
