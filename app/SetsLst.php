<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class SetsLst extends Model
{
    use Resizable;
	protected $table = 'sets_lst';
    protected $primaryKey = 'sets_id';
}
