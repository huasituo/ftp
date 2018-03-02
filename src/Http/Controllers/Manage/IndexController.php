<?php 

namespace Huasituo\Ftp\Http\Controllers\Manage;
use Huasituo\Hstcms\Http\Controllers\Manage\BasicController;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;

class IndexController extends BasicController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
    	$config = hst_config('ftp');
    	return $this->loadTemplate('ftp::manage.index', ['config'=>$config]);
    }

    public function save(Request $request)
    {
    	$arrRequest = $request->all();
    	$data =[
            ['name'=>'host', 'value'=>$arrRequest['host'], 'system'=>1],
            ['name'=>'port', 'value'=>$arrRequest['port'], 'system'=>1],
    		['name'=>'username', 'value'=>$arrRequest['username'], 'system'=>1],
            ['name'=>'password', 'value'=>$arrRequest['password'], 'system'=>1],
    	];
        $configData = [
            'FTP_HOST' => $arrRequest['host'] ? trim($arrRequest['host']) : '',
            'FTP_PORT' => $arrRequest['port'] ? trim($arrRequest['port']) : 21,
            'FTP_USERNAME' => $arrRequest['username'] ? trim($arrRequest['username']) : '',
            'FTP_PASSWORD' => $arrRequest['password'] ?  trim($arrRequest['password']) : ''
        ];
        $oldConfig = hst_config('ftp');
    	hst_save_config('ftp', $data);
        hst_updateEnvInfo($configData);
        $this->addOperationLog(hst_lang('hstcms::manage.config.ftp.update'),'', hst_config('ftp'), $oldConfig);
        return $this->showMessage('hstcms::public.save.success');
    }
}

