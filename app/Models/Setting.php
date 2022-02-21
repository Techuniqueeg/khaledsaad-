<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded=[];
    public static function setMany($data)
    {
        foreach ($data as $key => $value) {
            Self::set($key, $value);
        }
    }
    public static function set($key, $value)
    {
        if($key === 'translatable') {
            return Self::setTranslatableSettings($value);
        }

        if(is_array($value)) {
            $value = json_encode($value);
        }
        Self::updateOrCreate(['key' => $key], ['val' => $value]);
    }
    protected $hidden = ['updated_at', 'created_at'];
    public function getLogoAttribute($image)
    {
        return asset('') .  $image;
    }

}
