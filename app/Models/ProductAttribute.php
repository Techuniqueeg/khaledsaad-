<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['updated_at', 'created_at'];
    protected $appends = ['Colors'];

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }

    public function getColorsAttribute()
    {
        $colorarray=[];
        foreach ( $this->value as  $row)
        {
            $name=  AttributeValues::where('id',$row)->first();
             array_push($colorarray,$name);
        }
        return $colorarray;
    }


}
