<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;
use DB;

class SubscribeList extends Model
{
    protected $table = 'subscribe_list';
	
	public static function send($id, $mail) {
		$data = self::where('id', $id)->select('title', 'content')->first();
		$data['link'] = route('inactivation', ['email' => $mail]);
		Mail::send('emails.subscribe', ['data'=>$data], function ($m) use ($mail, $data) {
			$m->from('admin@mpl.by', 'MTG');
			$m->to($mail, 'Админ сайта')->subject($data->title);
        });
		return 1;
	}

	public static function sendAll($id) {
		$emails = DB::table('subscribe')->pluck('email');
		foreach($emails as $mail) {
			self::send($id, $mail);
		}
		return 1;
	}
}
