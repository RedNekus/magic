<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;

class SubscribeController extends Controller
{
	public function subscribe(Request $request) {
		if($request->has('email')) {
			$email = $request->input('email');
			return Subscribe::insert($email);
		}
	}

	public function activation($id, $token) {
		$email = Subscribe::query()
			->where('id', $id)
			->pluck('email')[0];
		if(md5($email) == $token) {
			Subscribe::query()
				->where('id', $id)
				->update(['token' => $token, 'active' => 1]);
			$message = "Ваш адрес электронной почты ".$email." успешно активирован.";
		} else {
			$message = "При активации вашего email ".$email." возникла ошибка!";
		}
		
		return view('activation', ['message' => $message]);
	}

	public function inactivation($email) {
		Subscribe::query()
			->where('email', $email)
			->update(['token' => '', 'active' => 0]);
		$message = "Ваш адрес электронной почты ".$email." убран из рассылки.";
		
		return view('activation', ['message' => $message]);
	}
}
