<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubscribeList;

class SubscribeListController extends Controller
{
    public function send(Request $request) {
		$id = $request->input('id');
		$mail = $request->input('email');
		return SubscribeList::send($id, $mail);
	}
	public function send_all(Request $request) {
		$id = $request->input('id');
		return SubscribeList::sendAll($id);
	}
}
