<?php

namespace App;



class Cart 
{
    //
    public $items=null;
    public $totalQuantity = 0;
    public $totalPrice=0;
    public function __construct($oldCart){
        if($oldCart != null){
            $this->items=$oldCart->items;
            $this->totalQuantity=$oldCart->totalQuantity;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }
    public function add($item, $id){
        $qty=1;
        if($item->promotion_price==0){
            $giohang=['qty'=>0,'price'=>$item->unit_price,'item'=>$item];
            if($this->items){
                if(array_key_exists($id,$this->items)){
                    $giohang=$this->items[$id];
                }
            }
            $giohang['qty']+=$qty;
            $giohang['price']=$item->unit_price*$giohang['qty'];
            $this->items[$id]=$giohang;
            $this->totalQuantity+=$qty;
            $this->totalPrice=$this->totalPrice+$item->unit_price;
            // echo($this->totalPrice+$item->unit_price*$giohang['qty']);
            
        }else{
            $giohang=['qty'=>0,'price'=>$item->promotion_price,'item'=>$item];
            if($this->items){
                if(array_key_exists($id,$this->items)){
                    $giohang=$this->items[$id];
                }
            }
            $giohang['qty']+=$qty;
            $giohang['price']=$item->promotion_price*$giohang['qty'];
            $this->items[$id]=$giohang;
            $this->totalQuantity+=$qty;
            $this->totalPrice+=$item->promotion_price;
            // echo($this->totalPrice+$item->promotion_price*$giohang['qty']);
        }
    }
    public function reduceByOne($id){
       
        if($this->items[$id]['item']['promotion_price']==0){
            $this->items[$id]['price'] -= $this->items[$id]['item']['unit_price'];
            $this->totalPrice = $this->totalPrice - $this->items[$id]['item']['unit_price'];
        }else{
            $this->items[$id]['price'] -= $this->items[$id]['item']['promotion_price'];
            $this->totalPrice = $this->totalPrice - $this->items[$id]['item']['promotion_price'];
        }
        $this->items[$id]['qty']--;
		$this->totalQuantity--;
        
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
        }
        
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQuantity -= $this->items[$id]['qty'];
		$this->totalPrice =$this->totalPrice - $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
