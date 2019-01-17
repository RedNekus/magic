<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Slider;
use Illuminate\Http\Request;
use DB;
use Mail;
use Session;

class BasketController extends Controller
{
    public function add(Request $request)
    {
		$type = $request->input('type');
		if(!$type) 
			$type = 'magic_cards';
		if ($request->session()->has('goods'.$type)) {
			if(session()->has('goods.'.$type.'.'.$request->input('id')))
				session(['goods.'.$type.'.'.$request->input('id') => $request->input('amount') + (int)session('goods.'.$request->input('id'))]);
			else 
				session(['goods.'.$type.'.'.$request->input('id') => $request->input('amount')]);
		} else {
			session(['goods'.$type => [$request->input('id')=>$request->input('amount')]]);
		}
		$basket = new Basket();
		$item = $basket->getCard($request->input('id'), $type);
		$asum = $basket->getAmount();
		return [$item, $asum];
    }
	public function del(Request $request) {
		$id = $request->input('id');
		$type = $request->input('type');
		if(!$type) 
			$type = 'magic_cards';
		if(session()->has('goods.'.$type.'.'.$id)) {
			session()->forget('goods.'.$type.'.'.$id);
		}
		$sum = 0;
		$basket = new Basket();
		if(session()->has('goods')) {
			$goods = $basket->getBasket();
			$sum = $basket->sum($goods);
		}
		return ['amount' => $basket->getAmount(), 'sum' => $sum];
	}
    public function send(Request $request)
    {
		$basket = new Basket();
		$data = $request->toArray();
		$data['goods'] = $basket->getBasket();
		$data['sum'] = $basket->sum($data['goods']);
		Mail::send('emails.test', $data, function ($m) {
			$m->from('admin@mpl.by', 'MTG');
			$m->to('fighterneko@gmail.com', 'Админ сайта')->subject('Заказ с сайта mpl.by');
		$m->cc('seo@kts.by');
        });
		Session::forget('goods');
		return 1;
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Basket $basket)
    {
		$goods = $basket->getBasket();
		$sum = $basket->sum($goods);
		$slider = Slider::getSlides();
		return view('basket.index', ['goods'=>$goods, 'sum' => $sum, 'slider' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
