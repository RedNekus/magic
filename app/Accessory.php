<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use TCG\Voyager\Traits\Resizable;

class Accessory extends Model
{
    //
	use Resizable;
	protected $table = 'accessories';
	protected $primaryKey = 'id';

	public static function addParamInBacket(&$goods) {
		if(Session::has('goods.accessories')) {
			$in_backet = array_keys(Session::get('goods.accessories'));
			if(isset($goods[0])) {
				$cnt = count($goods);
				for( $i = 0; $i < $cnt; $i++) {
					$goods[$i]->in_backet = in_array($goods[$i]->id, $in_backet)? 1 : 0;
				}
			} else {
				$goods->in_backet = in_array($goods->id, $in_backet)? 1 : 0;
			}
		}
	}

	public static function getItems($page=1) {
		$offset = 10*($page - 1);
		$q = self::query();
		$q->offset($offset)
            ->limit(10);
		$res = $q->get();
		self::addParamInBacket($res);

		return $res;
	}

	public static function total() {
		$q = self::query();
		$res = $q->count();

		return $res;
	}
	public static function getSingle($id) {
		$q = self::query()->where('id','=', $id);
		$res = $q->first();
		self::addParamInBacket($res);

		return $res;
	}
}