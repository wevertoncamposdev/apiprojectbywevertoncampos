<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    use Uuid;
    use SoftDeletes;
    protected $fillable = ['name','description'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class)
        ->withTimestamps()
        ->withPivot('product_discount');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}

