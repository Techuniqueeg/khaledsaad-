<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Product()
    {
        return $this->belongsTo(Project::class, 'project_id','id')->with('Category','Type','Location');
    }

}
