<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden = ['updated_at', 'created_at'];

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }
}
