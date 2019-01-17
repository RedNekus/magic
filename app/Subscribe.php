<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Subscribe extends Model
{
    protected $table = 'subscribe';
	public static function insert($email) {
		if( Subscribe::query()->where('email', '=', $email)->count() )
			return 0;
		$id = Subscribe::query()->insertGetId(
			['email' => $email, 'created_at' => date("Y-m-d H:i:s")]
		);
		$activationLink = route('activation', ['id' => $id, 'token' => md5($email)]);
		$data=['email'=>$email, 'link' => $activationLink];
		Mail::send('subscribe_email', $data, function ($m) {
			$m->from('admin@mpl.by', 'MTG');
			$m->to('fighterneko@gmail.com', 'Админ сайта')->subject('Подтверждение подписки');
			$m->cc('seo@kts.by');
        });
		return 1;
	}
	public static function activate() {
		
	}
}