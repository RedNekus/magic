<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Request;
use TCG\Voyager\Traits\Resizable;

class Buster extends Model
{
    //busters
	use Resizable;
	protected $table = 'busters';
	protected $primaryKey = 'id';
	public function language() {
		return $this->belongsTo(LangLst::class, 'lang_id', 'lang_id');
	}
	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'category_id');
	}
	public function producer() {
		return $this->belongsTo(Producer::class, 'producer_id', 'producer_id');
	}
	public function country() {
		return $this->belongsTo(Country::class, 'country_id', 'country_id');
	}

	public static function addParamInBacket(&$goods) {
		if(Session::has('goods.busters')) {
			$in_backet = array_keys(Session::get('goods.busters'));
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
	public static function getBusters($type=1, $page=1) {
		$offset = 10*($page - 1);
		$q = self::query()->where('type','=', $type);
		if($type == 0)
			$q->orWhere('type','=', NULL);
		$params = ['price','gamers','age'];
		$q->where(function ($query) use ($params) {
			foreach($params as $param) {
				if(Session::has($param."_from") && Session::has($param."_to")) {
					$query->whereBetween($param, [Session::get($param."_from"), Session::get($param."_to")]);
				}
			}
		});
		$q->offset($offset)
			->limit(10);
		$res = $q->get();
		self::addParamInBacket($res);

		return $res;
	}
	public static function total($type=1) {
		$q = self::query()->where('type','=', $type);
		if($type == 0)
			$q->orWhere('type','=', NULL);
		$res = $q->count();

		return $res;
	}
	public static function getSingle($id) {
		$q = self::query();
		$q  ->join('lang_lst', 'busters.language', '=', 'lang_lst.lang_id')
			->join('Categories', 'busters.category', '=', 'Categories.category_id')
			->join('Countries', 'busters.country', '=', 'Countries.country_id')
			->join('Producers', 'busters.producer', '=', 'Producers.producer_id');
		$q->where('id','=', $id);
		$res = $q->first();
		self::addParamInBacket($res);

		return $res;
	}
	
	public static function setFilter() {
		Request::flash();
		$all = Session::all();
		foreach($all as $name=>$item) {
			if(!Request::has($name))
				Session::forget($name);
		}
		session( Request::all() );
	}
}
