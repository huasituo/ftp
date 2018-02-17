<?php
namespace Huasituo\Ftp\Hook;

/**
* 
*/
class FtpConfigHook 
{
	/**
     * 后台菜单钩子
     *
     * @param array $data 菜单数组
     * @return array
     */
    public function getManageMenu($data)
    {
        $data['manageFtpIndex'] = [
            'name' => hst_lang('ftp::public.ftp'),
            'ename' => 'manageFtpIndex',
            'icon' => '',
            'url' => 'manageFtpIndex',
            'parent' => 'system',
            'parents' => 'config',
            'level' => 3,
            'module' => 'ftp'
        ];
        return $data;
    }

    /**
     * 后台权限点
     *
     * @param array $data 数组
     * @return array
     */
    public function getCommonRoleUri($data)
    {
        $data['manageFtpIndex'] = [
            'name' => hst_lang('ftp::public.ftp'),
            'remark' => 'ftp',
            'ename' => 'manageFtpIndex',
            'uri' => 'ftp/index',
            'parent' => 'manageFtpIndex',
            'module' => 'ftp'
        ];
        $data['manageFtpSave'] = [
            'name' => hst_lang('ftp::public.ftp.save'),
            'remark' => 'ftp',
            'ename' => 'manageFtpSave',
            'uri' => 'ftp/save',
            'parent' => 'manageFtpSave',
            'module' => 'ftp'
        ];
        return $data;
    }
}