<?php 

namespace Huasituo\Ftp\Http\Controllers;

use Huasituo\Hstcms\Http\Controllers\BasicController as BaseController;
use Illuminate\Http\Request;

use Ftp;

class TestController extends BaseController
{

    public function index() 
    {
    	$dirList = FTP::connection()->getDirListing();
    	foreach ($dirList as $key => $value) {
    		echo $key.'------'.$value.PHP_EOL;
    	}
    }

}