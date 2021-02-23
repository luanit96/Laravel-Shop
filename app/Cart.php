<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	public $totalSalePrice = 0;
	public $total;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
			$this->totalSalePrice = $oldCart->totalSalePrice;
			$this->total = $oldCart->total;
		}
	}

	public function add($item, $productid){
		$giohang = ['qty'=>0, 'price' => $item->price,'saleprice'=>$item->saleprice, 'item' => $item];
		if($this->items){
			if(array_key_exists($productid, $this->items)){
				$giohang = $this->items[$productid];
			}
		}
		$giohang['qty']++;
		if($giohang['saleprice']) {
			$giohang['saleprice'] = $item->saleprice * $giohang['qty'];
		} else {
			$giohang['price'] = $item->price * $giohang['qty'];
		}
		$this->items[$productid] = $giohang;
		$this->totalQty++;
		if($giohang['saleprice']) {
			$this->totalSalePrice += $item->saleprice;
		}
		else {
			$this->totalPrice += $item->price;
		}

		$this->total = $this->totalSalePrice + $this->totalPrice;
	}
	//xóa 1
	public function reduceByOne($productid){
		$this->items[$productid]['qty']--;
		if($this->items[$productid]['item']['saleprice']) {
			$this->items[$productid]['saleprice'] -= $this->items[$productid]['item']['saleprice'];
		} else {
			$this->items[$productid]['price'] -= $this->items[$productid]['item']['price'];
		}
		$this->totalQty--;
		if($this->items[$productid]['item']['saleprice']) {
			$this->totalSalePrice -= $this->items[$productid]['item']['saleprice'];
		} else {
			$this->totalPrice -= $this->items[$productid]['item']['price'];
		}
		$this->total = $this->totalSalePrice + $this->totalPrice;
		if($this->items[$productid]['qty']<=0){
			unset($this->items[$productid]);
		}
	}
	//xóa nhiều
	public function removeItem($productid){
		$this->totalQty -= $this->items[$productid]['qty'];
		if($this->items[$productid]['saleprice']) {
			$this->totalSalePrice -= $this->items[$productid]['saleprice'];
		}
		else {
			$this->totalPrice -= $this->items[$productid]['price'];
		}

		$this->total = $this->totalSalePrice + $this->totalPrice;
		unset($this->items[$productid]);
	}
}
