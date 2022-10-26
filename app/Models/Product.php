<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Uuid;
    use SoftDeletes;
    
    protected $fillable = ['name','description', 'price'];

    /* Manipulando dados antes das entradas e saídas do banco de dados */
    public function getPriceAtrribute()
    {
        return $this->attributes['price'] / 100;
    }

    public function setPriceAtrribute($attr)
    {
        return $this->attributes['price'] = $attr * 100;
    }
}
