<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buster;
use App\Page;
use App\Accessory;

class BusterController extends Controller
{
    //
	public function index($boosters, $pnum=1) {
		if($boosters == 'accessory') {
			$busters = Accessory::getItems($pnum);
			$cnt = ceil(Accessory::total()/10);
		} else {
			if($boosters == 'sets') {
				$type = 0;
			} else {
				$type = 1;
			}
			$busters = Buster::getBusters($type, $pnum);
			$cnt = ceil(Buster::total($type)/10);
		}
		$content = Page::where('slug', $boosters)->first();
		return view("busters.index", ['busters' => $busters, 'cnt' => $cnt, 'pnum'=>$pnum, 'sname' => $boosters, 'content' => $content]);
	}
	public function show($boosters, $id) {
		if($boosters == 'accessory') {
			$buster = Accessory::getSingle($id);
		} else {
			$buster = Buster::getSingle($id);
		}
		return view("busters.show", ['buster' => $buster, 'sname' => $boosters]);
	}
	public function filter($boosters, $pnum=1) {
		Buster::setFilter();
		if($boosters == 'sets') {
			$type = 0;
		} else {
			$type = 1;
		}
		$cnt = ceil(Buster::total($type)/10);
		$busters = Buster::getBusters($type, $pnum);
		return view('busters._catalog', ['busters' => $busters, 'cnt' => $cnt, 'pnum'=>$pnum, 'sname' => $boosters]);
	}
}
