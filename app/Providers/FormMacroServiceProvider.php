<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormMacroServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Form::macro('rawLabel', function($name, $value = null, $options = array())
		{
			$label = Form::label($name, '%s', $options);

			return sprintf($label, $value);
		});
		Form::macro('customSelect', function($name, $list, $value = null, $options = array())
		{
			$list2 = ['0'=>'Выберите сет'];
			foreach($list as $set) {
				$list2[$set->sets_id]= $set->sets_name;
			}
			$select = Form::select($name, $list2, $value = null, $options);

			return $select;
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