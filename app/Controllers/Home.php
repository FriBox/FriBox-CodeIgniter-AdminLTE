<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;


class Home extends FWController {

    public function index() {  //系统首页；
        $Data=$this->_GetLanguage(true);  //获取本地语言，控制器初始化完成；
        log_message('debug', 'Route::Index');  return view('Index',$Data);  //输出页面；
    }  // Route::Index [END]

    public function reset() {  //重置Session和Cookie；
        $Data=$this->_GetLanguage();  //获取本地语言，控制器初始化完成；
        $Data['xMessage']=lang('default.txt_Success');//缓存“操作成功”的输出语言；
        Services::session()->destroy();  //删除当前会话的所有Session；
        foreach ($_COOKIE as $key => $value) { setcookie($key, '', 0, '/'); }  //删除当前会话的所有Cookie；
        log_message('debug', 'Route::Reset');  return $this->response->setStatusCode(200)->setJSON(['Success' => true, 'Message' => $Data['xMessage'] ]);  //输出成功页面；
    }  // Route::Reset [END]

    public function language() {  //设置本地语言；
        $Data=$this->_SetLanguage(true);  //获取本地语言，控制器初始化完成；
        $Data['xMessage']=lang('default.txt_Language');  //输出语言名字；
        log_message('debug', 'Route::Language');  return $this->response->setStatusCode(200)->setJSON(['Success' => true, 'Message' => $Data['xMessage'], 'Language' => $Data['xFWLang'] ]);  //输出成功页面；
    }  // Route::Language [END]

}
