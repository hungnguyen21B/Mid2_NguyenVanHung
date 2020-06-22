<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public function typeProduct(){
        return $this->beLongTo('App\TypeProduct');
    }
    public function bill_detail(){
        return $this->hasMany('App\TypeProduct');
    }
}
