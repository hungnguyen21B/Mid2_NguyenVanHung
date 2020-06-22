<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = 'Bills';
    Protected $primaryKey = "id";
    public function customer(){
            return $this->beLongTo('App\Customer');
        }
        public function bill_detail(){
            return $this->hasMany('App\BillDetail');
        }
}
