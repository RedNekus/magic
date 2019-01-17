<?php

namespace App\Http\Controllers;

use App\MagicCards;
use App\Slider;
use App\Page;
use App\Banner;
use App\SetsLst;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use DB;
use Session;

class MagicCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function view(Request $data) {
		Session::put('view', $data->view);
		
		return $data->view;
	}
	public function home(Request $request) {
		if($request->has('where')) {
			$where =& $request->input('where');
		} else {
			$where = ['new' => 1];
		}
		$cards = MagicCards::mainCards($where);
		$slider = Slider::getSlides();
		$page = Page::where('slug', '/')->where('status', 1)->first();
		$banners = Banner::getBanners();
		return view('home', ['cards' => $cards, 'slider' => $slider, 'page' => $page, 'banners' => $banners]);
	}
	public function search(Request $request, $pnum=1) {
		$search = [];
		$search = MagicCards::search($request->input('search_text'), $pnum);

		return view('cards.search', $search);
	}
	public function ajax(Request $request) {
		if($request->has('where')) {
			$where = $request->input('where');
		} else {
			$where = ['new' => 1];
		}
		$cards = MagicCards::mainCards($where);
		return view('main_cards', ['cards' => $cards]);
	}	
	public function others(Request $request) {
		if($request->has('id') && $request->has('sets')) {
			$q = MagicCards::query();
			$q	->where('sets','=', $request->input('sets'))
				->where('id','<>', $request->input('id'));
			if($request->input('page')) {
				$pnum = (int)$request->input('page');
				$q->offset(($pnum - 1)*3);
			}
			$q->limit(3);
			$others = $q->get();
			return view('cards._others', ['others' => $others]);
		}
	}
	public function index($sec, $pnum=1)
	{
		$magic = new MagicCards(); 
		$cards = $magic->getCards($pnum);

		$cnt = ceil($magic->totalRow()/18);
		$content = Page::where('slug', $sec)->first();
		return view('cards.index', ['cards' => $cards, 'cnt'=>$cnt, 'pnum'=>$pnum, 'content' => $content]);
	}
	public function filter(MagicCards $magic) {
		$cards = $magic->getCards();
		$cnt = ceil($magic->totalRow()/18);
		$pnum = 1;
		return view('cards._catalog', ['cards' => $cards, 'cnt' => $cnt,'pnum'=>$pnum]);
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\MagicCards  $magicCards
     * @return \Illuminate\Http\Response
     */
    public function show($section, $id)
    {
		$q = MagicCards::query();
		$q  ->join('color_lst', 'magic_cards.color', '=', 'color_lst.color_id')
			->join('rarity_lst', 'magic_cards.rarity', '=', 'rarity_lst.rarity_id')
			->join('lang_lst', 'magic_cards.lang', '=', 'lang_lst.lang_id')
			->join('condition_lst', 'magic_cards.condition', '=', 'condition_lst.condition_id')
			->join('sets_lst', 'magic_cards.sets', '=', 'sets_lst.sets_id');
		$q->where('id','=', $id);
		$card = $q->get();
		$q2 = MagicCards::query();
		$q2	->where('sets','=',$card[0]->sets)
			    ->where('id','<>',$card[0]->id);
		$q2->limit(3);
		$others = $q2->get();
		$total = MagicCards::query()
				->where('sets','=',$card[0]->sets)
			    ->where('id','<>',$card[0]->id)->count();
		return view('cards.show', ['card' => $card[0], 'sortby' => ['rarity' => 'По редкости', 'color' => 'По цвету', 'sets' => 'По изданию', 'price' => 'По цене'], 'others' => $others, 'cnt' => ceil($total/3), 'pnum' => 1]);
    }
}
