<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Basket;
use App\SetsLst;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		view()->composer('*', function ($view) 
		{
			//view()->share('lang', \Session::get('lang', 'de_DE'));
			$b = new Basket;
			$view->with('basket', $b->getBasket() );
			$view->with('asum', $b->getAmount() );
		});
		
		view()->composer('cards.index', function ($view) 
		{
			$view->with('colors', DB::table('color_lst')->get());
			$view->with('rarity', DB::table('rarity_lst')->get());
			$view->with('lang', DB::table('lang_lst')->get());
			$view->with('condition', DB::table('condition_lst')->get());
			$view->with('select', SetsLst::query()->get());
			$view->with('sortby', ['rarity' => 'По редкости', 'color' => 'По цвету', 'sets' => 'По изданию', 'price' => 'По цене']);	
		});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
