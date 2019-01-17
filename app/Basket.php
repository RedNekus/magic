<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Basket extends Model
{
    public function getBasket() {
		$goods = [];
		if(session()->has('goods')) {
			if(is_array(session('goods'))) {
				$res = [];
				foreach(session('goods') as $type=>$item) {
					$ids = array_keys($item);
					if($type=='magic_cards')
						$q = MagicCards::query()->select('id', 'name', 'price', 'image')->whereIn('id', $ids);
					else if($type=='accessories')
						$q = Accessory::query()->select('id', 'name', 'price', 'image')->whereIn('id', $ids);
					else
						$q = Buster::query()->select('id', 'name', 'price', 'photo as image')->whereIn('id', $ids);
					$res[] = $q->get();
					foreach($res[count($res) - 1] as $ri) {
						if(session()->has('goods.'.$type.'.'.$ri->id)) {
							$ri->amount = (int)session('goods.'.$type.'.'.$ri->id);
							$ri->type = $type;
						}
					}
				}
				foreach($res as $k=>$item) {
					if(!$k) {
						$goods = $item;
					}
					else {
						foreach($item as $val) {
							$goods[] = $val;
						}
					}
				}
			}
		}
		return $goods;
	}
	public function sum(&$goods) {
		$sum = 0;
		foreach($goods as $item) {
			$sum += $item->amount*$item->price;
		}
		return $sum;
	}
	public function getCard($id, $type) {
		$res = DB::table($type)->select('id', 'name', 'price', ($type=='busters'? 'photo' : 'image').' as image')->where('id', '=', $id)->first();

		return $res;
	}
	public function getAmount() {
		$asum = 0;
		if(session()->has('goods')) {
			foreach(session('goods') as $item) {
				$asum += array_sum($item);
			}
		}
		return $asum;
	}
	public static function addText($asum) {
		$end = $asum%10;
		if( 1 < $end && $end < 5)
			$suffix = "a";
		else if($end > 4 || $end==0)
			$suffix = "ов";
		else 
			$suffix = "";
		return $asum." товар".$suffix;
	}
}
