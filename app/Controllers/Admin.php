<?php

namespace App\Controllers;

class Admin extends FWController {

    public function index() {  //系统首页；
        $Data=$this->_GetLanguage();  //获取本地语言，控制器初始化完成；
        $Data['xControllerName']='Admin/Index';  //输出信息；
        $xChkLogin=$this->_ChkLogin();  //验证保存的信息
        if ($xChkLogin['xFWChkLogin'] ?? '-1' != 0) { log_message('debug', 'Route::Admin');  echo "<meta http-equiv='Refresh' content='0;URL=/Admin/Login'>";  return; };  //-1：验证失败；
        $Data = array_merge($Data, $xChkLogin);  //0：验证成功；
        log_message('debug', 'Route::Admin');  return view('Admin/Admin',$Data);  //输出页面；
    }  // Route::Admin [END]

    public function login() {  //登录页面；
        $request = \Config\Services::request();
        $Data=$this->_GetLanguage();  //获取本地语言，控制器初始化完成；
        $Data['xControllerName']='Admin/Login';  //输出信息；
        $Data['xFWUser']='';  //之前用户验证失败的历史用户名；
        if ( $this->request->getServer('REQUEST_METHOD') == 'POST' ) {
            // 处理post请求，验证用户；
            $xUsername = trim($request->getPost('vUser'));  //读取Post中的用户名；
            $xPassword = trim($request->getPost('vPass'));  //读取Post中的密码；
            $xChkAuthenticate=$this->_ChkAuthenticate($xUsername,$xPassword);  //验证用户信息
            switch ($xChkAuthenticate['xFWChkAuthenticate'] ?? '-99') {
            case 0:  //0：验证成功；
                $Data['xFWUser']=$xUsername;  //用户验证识别的用户名；
                break;
            case -1:  //-1：用户名或密码空白；
                $Data['xFWUser']=$xUsername;  //用户验证识别的用户名；
                $Data['xFWErr']=lang('default.txt_UPValidation1');  //输出用户名或密码空白的错误；
                log_message('debug', 'Route::Admin/Login');  return view('Admin/Login',$Data);  //输出页面；
                break;
            case -2:  //-2：用户名与密码验证登录失败；
                $Data['xFWUser']=$xUsername;  //用户验证识别的用户名；
                $Data['xFWErr']=lang('default.txt_UPValidation2');  //输出用户名与密码验证登录失败的错误
                log_message('debug', 'Route::Admin/Login');  return view('Admin/Login',$Data);  //输出页面；
                break;
            case -3:  //-3：AdminUserConfig文件不存在；
                $Data['xFWErr']=lang('default.txt_SYSValidation1');  //输出AdminUserConfig文件不存在的错误信息；
                log_message('debug', 'Route::Admin/Login');  return view('Admin/Login',$Data);  //输出页面；
                break;
            case -4:  //-4：AdminUserConfig文件包含错误信息；
                $Data['xFWErr']=lang('default.txt_SYSValidation2');  //输出AdminUserConfig文件包含错误的错误信息；
                log_message('debug', 'Route::Admin/Login');  return view('Admin/Login',$Data);  //输出页面；
                break;
            default:  //-99：验证用户内部未知错误；
                $Data['xFWErr']=lang('default.txt_SYSValidation3');  //输出验证用户内部未知错误；
                log_message('debug', 'Route::Admin/Login');  return view('Admin/Login',$Data);  //输出页面；
            }
            //用户验证成功后预处理与跳转；
            $Data = array_merge($Data, $xChkAuthenticate);
            log_message('debug', 'Route::Admin/Login');  echo "<meta http-equiv='Refresh' content='1;URL=/Admin'>";  return;
        } else {
            // 处理get请求，输出登录页面
            $Data['xFWErr']='';  //输出信息；
            log_message('debug', 'Route::Admin/Login');  return view('Admin/Login',$Data);  //输出页面；
        }
    }  // Route::Admin/Login [END]

    public function logout() {  //登出页面；
        $Data=$this->_GetLanguage();  //获取本地语言，控制器初始化完成；
        $Data['xControllerName']='Admin/Logout';  //输出信息；
        helper('cookie');  $session=\Config\Services::session();  if (!$session->has('started')) { $session->start(); };  //加载项；
        delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
        log_message('debug', 'Route::Admin/Logout');  echo "<meta http-equiv='Refresh' content='1;URL=/Admin'>";  return;  //输出页面；
    }  // Route::Admin/Logout [END]

}
