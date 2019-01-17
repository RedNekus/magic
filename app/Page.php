<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use TCG\Voyager\Models\MenuItem;

class Page extends Model
{
	protected $table = 'pages';
	protected $primaryKey = 'id';
	/*
	public function pageId() {
		return $this->belongsTo(MenuItem::class);
	}
	public function pageIdList(){
		return MenuItem::where('menu_id', '<>', 1)->orderBy('menu_id')->get();
	}
	public static function getPage($pid) {
		return Page::query()->where('page_id', '=', $pid)->first();
	}
	*/
}
