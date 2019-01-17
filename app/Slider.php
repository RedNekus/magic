<?php

namespace App;

use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use Resizable;
	protected $table = 'slider';
	static public function getSlides() {
		return Slider::query()->select('image', 'alt')->get();
	}
}
