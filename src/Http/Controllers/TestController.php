<?php 

namespace Huasituo\Ftp\Http\Controllers;

use Huasituo\Ftp\Http\Controllers\Controller ;
use Illuminate\Http\Request;

use Ftp;

class TestController extends Controller
{

    public function index() 
    {
    	$dirList = FTP::connection()->getDirListing();
    	foreach ($dirList as $key => $value) {
    		echo $key.'------'.$value.PHP_EOL;
    	}
    }

}