<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    Protected $primaryKey = "id";
    protected $table ='customer';
    public function bill(){
            return $this->hasMany('App\Bill');
        }
}
