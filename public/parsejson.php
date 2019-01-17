<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require __DIR__.'/../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([ 'driver' => 'mysql', 'host' => 'localhost', 'database' => 'ksby_magic', 'username' => 'ksby_magic', 'password' => '12cat34', 'charset' => 'utf8', 'collation' => 'utf8_unicode_ci', 'prefix' => '', ]); 
// Set the event dispatcher used by Eloquent models... (optional) 
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container; 
$capsule->setEventDispatcher(new Dispatcher(new Container));
// Set the cache manager instance used by connections... (optional) 
//$capsule->setCacheManager(...); 
// Make this Capsule instance available globally via static methods... (optional) 
$capsule->setAsGlobal(); 
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher()) 
$capsule->bootEloquent();


echo "<h1>TEST PARSING</h1>";

$res = Capsule::table('magic_cards')->get();
var_dump($res);

?>