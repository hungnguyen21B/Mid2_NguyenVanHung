<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    //
    protected $table = 'type_products';

    public function typeProduct(){
        return $this->hasMany('App\Product');
    }
}
