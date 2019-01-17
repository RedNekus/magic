<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use Request;
use Session;

class MagicCards extends Model
{
	use Resizable;
	public function color() {
		return $this->belongsTo(ColorLst::class, 'color_id', 'color_id');
	}
	public function sets() {
		return $this->belongsTo(SetsLst::class, 'sets_id', 'sets_id');
	}
	public function rarity() {
		return $this->belongsTo(RarityLst::class, 'rarity_id', 'rarity_id');
	}
	public function lang() {
		return $this->belongsTo(LangLst::class, 'lang_id', 'lang_id');
	}
	public function condition() {
		return $this->belongsTo(ConditionLst::class, 'condition_id', 'condition_id');
	}
	public function pageId() {
		return $this->belongsTo(Page::class);
	}
	public static function addParamInBacket(&$goods) {
		if(Session::has('goods')) {
			$in_backet = array_keys(Session::get('goods'));
			$cnt = count($goods);
			for( $i = 0; $i < $cnt; $i++) {
				$goods[$i]->in_backet = in_array($goods[$i]->id, $in_backet)? 1 : 0;
			}
		}
	}
	public static function search($search, $pnum) {
		$q = MagicCards::query()->join('sets_lst', 'magic_cards.sets', '=', 'sets_lst.sets_id');
		if($search) {
			$q	->where('name','like', "%".$search."%")
				->orWhere('type','like', "%".$search."%")
				->orWhere('decription','like', "%".$search."%")
				->orWhere('sets_name','like', "%".$search."%");
		}
		$total = $q->count();
		if($pnum > 1)
			$q->offset(($pnum - 1)*5);
		$q->limit(5);
		return ['search' => $q->get(), 'total'=>$total, 'pnum'=>$pnum];
	}
	
	public static function mainCards($where) {
		$q = MagicCards::query()->where($where, '>=', 1);
		$res = $q->get();
		MagicCards::addParamInBacket($res);
		return $res;
	}
	public static function currentSet($sets) {
		if( Session::has('sets') ) {
			foreach( $sets as $set ) {
				if(Session::get('sets')==$set->sets_id)
					return $set->sets_name;
			}
		}
	}
	public function getCards($pnum=0) {
		$params = ['sets', 'color', 'rarity', 'lang', 'foil'];
		$q = MagicCards::query();
		$q  ->join('color_lst', 'magic_cards.color', '=', 'color_lst.color_id')
			->join('rarity_lst', 'magic_cards.rarity', '=', 'rarity_lst.rarity_id')
			->join('lang_lst', 'magic_cards.lang', '=', 'lang_lst.lang_id')
			->join('condition_lst', 'magic_cards.condition', '=', 'condition_lst.condition_id')
			->join('sets_lst', 'magic_cards.sets', '=', 'sets_lst.sets_id');
		if(Request::has('_token')) {
			if( Request::input('sets') == 0 )
				Session::forget('sets');
			foreach($params as $param) {
				if(!Request::has($param))
					Session::forget($param);
			}
		}
		Request::flash();
		if( Request::has('sets') ) {
			if( Request::input('sets')!=0)
				$q->where('sets', '=', Request::input('sets'));
		} else if( Session::has('sets')) {
			$q->where('sets', '=', Session::get('sets'));
		}
		foreach($params as $param) {
			unset($values);
			if($param == 'sets') continue;
			if( Request::has($param) ) {
				$values = Request::input($param);
			} else if(Session::has($param)) {
				$values = Session::get($param);
			}
			if(isset($values)) {
				$q->where(function ($query) use ($values, $param) {
					foreach ($values as $item) {
						$query->orWhere($param, '=', $item);
					}
				});
			}
		}
		if(Request::has('sortby')) {
			$q->orderBy(Request::input('sortby'), 'desc');
		}
		if($pnum) {
			$q->offset(($pnum - 1)*18);
		}
		$q->limit(18);
		$res = $q->get();
		MagicCards::addParamInBacket($res);
		return $res;
	}
	public function totalRow() {
		$q = MagicCards::query();
		if( Request::input('sets') ) {
			Session::put('sets', Request::input('sets'));
			$q->where('sets', '=', Request::input('sets'));
		}
		$params = ['color', 'rarity', 'lang', 'foil'];
		foreach($params as $param) {
			unset($values);
			if($param == 'sets') continue;
			if( Request::has($param) ) {
				$values = Request::input($param);
				Session::put($param, $values);
			} else if(Session::has($param)) {
				$values = Session::get($param);
			}
			if(isset($values)) {
				$q->where(function ($query) use ($values, $param) {
					foreach ($values as $item) {
						$query->orWhere($param, '=', $item);
					}
				});
			}
		}
		return $q->count();
	}
}
