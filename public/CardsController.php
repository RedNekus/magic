<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller as Controller;
class CardsController extends Controller
{
	public static function testDB() {
		//DB::connection()->getPdo();
		echo "<p>testDB</p>";
		return null;
	}

}

	//echo "TEST PARSING 22";
	//CardsController::testDB();
	//$res = DB::table('magic_cards')->get();
	//var_dump($res);
	//echo "111 222 333";
	/*$file = file_get_contents ("AllCards.json");
	$data = json_decode($file);
	foreach($data as $item) {
		echo $item->name."<br>";
		foreach($item->foreignData as $foreign) {
			echo "\t->".$foreign->name."<br>";
		}
	}*/
?>