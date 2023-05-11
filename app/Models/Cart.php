<?php
namespace App\Models;

class Cart{
    public $items = null;
    public $totalQty = 0;
    public $totalPrc = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrc = $oldCart->totalPrc;
        }
    }

    public function add($item, $id){
        $cart = ['qty' => 0, 'price' => $item->unit_price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id,$this->items)){
                $cart = $this->items[$id];
            }
        }
        $cart['qty']++;
        if($item->promotion_price == 0) {
            $item->unit_or_promotion_price = $item->unit_price;
           } else {
            $item->unit_or_promotion_price = $item->promotion_price;
           }
        $cart['price'] = $item->unit_price * $cart['qty'];
        $this->items[$id] = $cart;
        $this->totalQty++;
        $this->totalPrc += $item->unit_or_promotion_price;;
    }
    public function reduceByOne($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['price']-= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrc -= $this->items[$id]['item']['price'];
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrc -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}