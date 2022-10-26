<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{      
    
    use HasFactory;
    use Uuid;
    use SoftDeletes;

    protected $fillable = ['name'];
    //protected $guarded = ['id'];
    //protected $hidden= ['id'];
    protected $date = ['deleted_at'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
