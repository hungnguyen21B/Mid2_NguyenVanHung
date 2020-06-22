<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    //
    Protected $primaryKey = "id";
    protected $table = 'bill_detail';
    public function bill(){
            return $this->beLongTo('App\Bill');
    }
    public function customer(){
        return $this->beLongTo('App\Customer');
    }
    public function product(){
        return $this->beLongTo('App\Product');
}

}
