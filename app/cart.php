<?php
namespace App;
class cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart){
        if ($cart){
            $this ->products = $cart ->products;
            $this ->totalPrice = $cart ->totalPrice;
            $this ->totalQuanty = $cart ->totalQuanty;
        }
    }
    public function AddCart($product, $id){
        $newProduct = ['quanty' => 0, 'price' => $product->price,'discount' => $product->discount->percent, 'productInfo' => $product];
        if ($this->products){
            if (array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * (($product->price)-(($product->price)*(($product->discount->percent)/100)));
        $this->products[$id] = $newProduct;
        //$this->totalPrice +=  $product->price;
        $this->totalPrice +=  (($product->price)-(($product->price)*(($product->discount->percent)/100)));
        $this->totalQuanty ++;
    }

    public function DelItemCart($id){
        $this ->totalQuanty -= $this->products[$id]['quanty'];
        $this ->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function UpdateItemCart($id, $quanty){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * (($this->products[$id]['productInfo']->price)-(($this->products[$id]['productInfo']->price)*(($this->products[$id]['productInfo']->discount->percent)/100)));
        //$this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->price;
//(($this->products[$id]['productInfo']->price)-(($this->products[$id]['productInfo']->price)*(($this->products[$id]['productInfo']->discount->percent)/100)))
        $this->totalQuanty += $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }
}
