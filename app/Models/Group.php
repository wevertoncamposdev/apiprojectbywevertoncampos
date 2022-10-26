<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    use Uuid;
    use SoftDeletes;
    protected $fillable = ['campaign_id','name','description'];
    protected $with = ['cities','campaign.products'];

    public function cities()
    {
        return $this->hasMany(Citie::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}