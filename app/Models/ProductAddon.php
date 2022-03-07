<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAddon extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden = ['updated_at', 'created_at','project_id'];
    public function Addon()
    {
        return $this->belongsTo(AddOn::class, 'addon_id', 'id');
    }
}
