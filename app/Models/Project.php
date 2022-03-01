<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden = ['updated_at', 'created_at'];

    public function getImageAttribute($image)
    {
        return asset('') .  $image;
    }
    public function Images()
    {
        return $this->hasMany(ProjectImages::class, 'project_id', 'id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function Colors()
    {
        return $this->hasOne(ProductAttribute::class, 'project_id');
    }

    public function Addon()
    {
        return $this->hasMany(ProductAddon::class, 'project_id');
    }

    protected $appends = ['favorite'];

    public function getFavoriteAttribute()
    {
        if (auth('api')->user()) {

            $auth = auth('api')->user()->id;
            if ($auth) {
                $product = favourite::where('project_id', $this->id)->where('user_id', $auth)->first();
                if ($product) {
                    return true;
                } else
                    return false;
            }
        }else
            return false;
    }
}
