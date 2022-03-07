<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function Product(){
        return $this->belongsTo(Project::class,'product_id','id')->with(['Category']);
    }
    public function getImageAttribute($image)
    {
        return asset('') .  $image;
    }
}
