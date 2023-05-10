<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

/* ======  自定义全局变量  ====== */
global $xLangs;
$xLangs=[ 'en' => 'en', 'english' => 'en',  //英语
                  'de' => 'de', 'deutsch' => 'de', 'german' => 'de',  //德语
                  'zh' => 'zh-CN', 'zhcn' => 'zh-CN', 'zh-cn' => 'zh-CN', 'zh_cn' => 'zh-CN', 'chs' => 'zh-CN', 'chinese' => 'zh-CN',  //简体中文
                  'tw' => 'zh-TW', 'zhtw' => 'zh-TW', 'zh-tw' => 'zh-TW', 'zh_tw' => 'zh-TW', 'cht' => 'zh-TW', 'taiwan' => 'zh-TW',  //繁体中文
]; // 自定义全局变量 [END]


abstract class FWController extends Controller
{

    public function _Get_PassSHA256($cInString='',$cPasswordSHA256='FBWASF-Pass-SHA256-',bool $cUpper = false) {  // 字符串混淆后SHA256输出；
        if ($cUpper) { $cInString=strtoupper($cInString); };  //转换成大写
        return strtoupper(hash('sha256', $cPasswordSHA256 . '[' . $cInString . ']' ));  //返回加密字串；
    }  // function::_Get_PassSHA256 [END]


    public function _Get_PassSHA512($cInString='',$cPasswordSHA512='FBWASF-Pass-SHA512-',bool $cUpper = false) {  // 字符串混淆后SHA512输出；
        if ($cUpper) { $cInString=strtoupper($cInString); };  //转换成大写
        return strtoupper(hash('sha512', $cPasswordSHA512 . '[' . $cInString . ']' ));  //返回加密字串；
    }  // function::_Get_PassSHA512 [END]


    public function _Get_FwInfo() {  // 获取框架信息；
        $TempVar['xFWName']=$_ENV['APP_NAME'];  // 系统名称；
        $TempVar['xFWVer']=$_ENV['APP_VER'];  //系统版本号；
        $TempVar['xCIVer']=\CodeIgniter\CodeIgniter::CI_VERSION;  //CodeIgniter版本号；
        $TempVar['xPHPVer']=phpversion();  //PHP版本号；
        $TempVar['xOSName']=php_uname('s');  //操作系统名称；
        $TempVar['xSYSName']=php_uname('n');  //当前机器名；
        $TempVar['xOSVer']=php_uname('r');  //操作系统版本号；
        $TempVar['xOSVersion']=php_uname('r').' '.php_uname('v');  //操作系统版本号;
        $TempVar['xOSArch']=php_uname('m');  //操作系统架构；
        $TempVar['xOSInfo']=php_uname('s') . ' v' . php_uname('r') . ' ' . php_uname('v') . ' ' . php_uname('m');  //操作系统信息；
        return $TempVar;  //返回框架信息；
    }  // function::_Get_FwInfo [END]


    public function _GetLanguage(bool $Mark = false) {  //获取本地语言，注：传入“是否标记”，默认标记（设置Framework的Cookie和Session标记）；
        helper('cookie');  $session=\Config\Services::session();  $request = \Config\Services::request();  if (!$session->has('started')) { $session->start(); };  //加载项；
        if ($Mark) { $session->set('Framework', 'FBWASF');  set_cookie('Framework', 'FBWASF', getenv('cookie.expires') );  };  //设置Framework的Session标记；设置Framework的Cookie标记；参数格式：$name, $value, $minutes ；
        $Lang=$session->get('Language');  if (!isset($Lang)) { $Lang=$request->getCookie('Language'); };  if (!isset($Lang)) { $Lang=$_ENV['APP_LOCALE']; };  //如没有再获取Cookie的Language，如没有再获取Session的Language；都没有就使用.env中的默认值；
        $Lang=strtolower(trim($Lang));  global $xLangs;  if (isset($xLangs[$Lang])) { $Lang=$xLangs[$Lang]; } else { $Lang=$_ENV['APP_LOCALE']; };//判断是否是系统允许的语种，并设置系统默认语言；
        Services::language()->setLocale($Lang);  $Lang=Services::language()->getLocale();  //设置当前语言；
        $session->set('Language',$Lang);  set_cookie('Language', $Lang, getenv('cookie.expires') );  $Data['xFWLang']=$Lang;  //记住语言；
        $Data=array_merge( $Data , $this->_Get_FwInfo() );  //添加系统信息；
        return $Data;  //返回语种信息；
    }  // function::_GetLanguage [END]


    public function _SetLanguage(bool $Mark = false) {  //设置本地语言，注：传入“是否标记”，默认标记（设置Framework的Cookie和Session标记）；
        helper('cookie');  $session=\Config\Services::session();  $request = \Config\Services::request();  if (!$session->has('started')) { $session->start(); };  //加载项；
        if ($Mark) { $session->set('Framework', 'FBWASF');  set_cookie('Framework', 'FBWASF', getenv('cookie.expires') );  };  //设置Framework的Session标记；设置Framework的Cookie标记；参数格式：$name, $value, $minutes ；
        //设置本地语言；
        $Lang=$request->getGet('l');  if (!isset($Lang)) { $Lang=$request->getGet('lang'); };  //先获取Get的l，如没有再获取Get的lang；
        if (!isset($Lang)) { $Lang=$request->getPost('l'); };  if (!isset($Lang)) { $Lang=$request->getPost('lang'); };  //如没有再获取Post的l，如没有再获取Post的lang；
        if (!isset($Lang)) { $Lang=$request->getCookie('Language'); };  if (!isset($Lang)) { $Lang=$session->get('Language'); };  //如没有再获取Cookie的Language，如没有再获取Session的Language；
        if (!isset($Lang)) { $Lang=$_ENV['APP_LOCALE']; };  //都没有就使用.env中的默认值；
        //以上4行代码：Post和Get一起取，同名post覆盖get，如果有Cookie就使用Cookie的设置值，失败就使用Session，最后都失败就用.env中的默认值；
        $Lang=strtolower(trim($Lang));  global $xLangs;  if (isset($xLangs[$Lang])) { $Lang=$xLangs[$Lang]; } else { $Lang=$_ENV['APP_LOCALE']; };//判断是否是系统允许的语种，并设置系统默认语言；
        Services::language()->setLocale($Lang);  $Lang=Services::language()->getLocale();  //设置当前语言；
        $session->set('Language',$Lang);  set_cookie('Language', $Lang, getenv('cookie.expires') );  $Data['xFWLang']=$Lang;  //记住语言；
        $Data=array_merge( $Data , $this->_Get_FwInfo() );  //添加系统信息；
        return $Data;  //返回语种信息；
    }  // function::_SetLanguage [END]


    public function _ChkAuthenticate($cUsername='', $cPassword='',bool $Mark = true) {  //验证用户登录
        //返回 0：验证成功；-1：用户名或密码空白；-2：用户名与密码验证登录失败；-3：AdminUserConfig文件不存在；-4：AdminUserConfig文件包含错误信息；-99：验证用户内部未知错误；
        helper('cookie');  $session=\Config\Services::session();  if (!$session->has('started')) { $session->start(); };  //加载项；
        if ($Mark) {  $session->set('Framework', 'FBWASF');  set_cookie('Framework', 'FBWASF', getenv('cookie.expires') );  };  //设置Framework的Session标记；设置Framework的Cookie标记；参数格式：$name, $value, $minutes ；
        $cUsername=trim($cUsername);  $cPassword=trim($cPassword);  $cPasswordSHA512= $this->_Get_PassSHA512($cPassword);  //密码字串
        delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
        $Data['xFWChkAuthenticate']=-99;  //-99：验证用户内部未知错误；
        //01.检验用户名或密码是否为空白
        if ($cUsername === null or $cUsername === '' or $cPassword === null or $cPassword === '') {
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkAuthenticate']=-1;  //-1：用户名或密码空白
            return $Data;  //返回验证结果；
        };
        //02.预处理AdminUserConfig文件；
        $cAdminUserConfig_file = ROOTPATH . getenv('AdminUserConfigPath') . getenv('AdminUserConfig');  //AdminUserConfig配置文件路径名；
        if (!file_exists($cAdminUserConfig_file)) {  //处理文件不存在的情况；
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkAuthenticate']=-3;  //-3：AdminUserConfig文件不存在；
            return $Data;  //返回验证结果；
        };
        //03.读取解析AdminUserConfig文件；
        $cAdminUsers = json_decode(file_get_contents($cAdminUserConfig_file), true);
        if (!isset($cAdminUsers)) {  //处理解析失败的情况；
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkAuthenticate']=-4;  //-4：AdminUserConfig文件包含错误信息
            return $Data;  //返回验证结果；
        };
        //04.开始遍历用户信息进行验证；
        $cAdminUserSHA256='';
        foreach ($cAdminUsers as $cAdminUser) {
            if (strtolower($cAdminUser['Username']) == strtolower($cUsername) && strtoupper($cAdminUser['Password']) == $cPasswordSHA512 ) {
                if (!$cAdminUser['Disable']) {
                    $cAdminUserName = Trim($cAdminUser['Username']);
                    $cAdminUserSHA256 = $this->_Get_PassSHA256($cAdminUser['Username'],True);  //计算用户唯一字串
                    $Data['xFWAdminUserUsername'] = $cAdminUserName;  //缓存用户名；
                    $Data['xFWAdminUserNickname']  = Trim($cAdminUser['Nickname']) ?? Trim($cAdminUser['Username']);  //缓存用户昵称；
                    $Data['xFWAdminUserDescription']  = Trim($cAdminUser['Description']) ?? '';  //缓存用户描述；
                    $Data['xFWAdminUserPermission']  = Trim($cAdminUser['Permission']) ?? '[Null]';  //缓存用户权限；
                };
                break;
            }
        }
        //05.如果遍历完所有用户信息都没有匹配到，则输出错误信息；
        if (!isset($cAdminUserName)) {
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkAuthenticate']=-2;  //-2：用户名与密码验证登录失败；
            return $Data;  //返回验证结果；
        }
        $Data['xFWChkAuthenticate']=0;  //0：验证成功；
        //写入Session和Cookie
        $cPasswordSHA512=$this->_Get_PassSHA512($cPasswordSHA512,True);  //再加一次密；
        $session->set('SecretUID',$cAdminUserSHA256);  set_cookie('SecretUID', $cAdminUserSHA256, getenv('cookie.expires') );  $Data['xFWSecretUID']=$cAdminUserSHA256;  //保存用户登录Cookie
        $session->set('SecretUKEY',$cPasswordSHA512);  set_cookie('SecretUKEY', $cPasswordSHA512, getenv('cookie.expires') );  $Data['xFWSecretUKEY']=$cPasswordSHA512;   //保存用户登录Session
        return $Data;  //返回验证结果；
    }  // function::_ChkAuthenticate [END]


    public function _ChkLogin(bool $Mark = true) {  //验证已登录信息
        //返回 0：验证成功；-1：验证失败；
        helper('cookie');  $session=\Config\Services::session();  $request = \Config\Services::request();  if (!$session->has('started')) { $session->start(); };  //加载项；
        if ($Mark) { $session->set('Framework', 'FBWASF');  set_cookie('Framework', 'FBWASF', getenv('cookie.expires') );  };  //设置Framework的Session标记；设置Framework的Cookie标记；参数格式：$name, $value, $minutes ；
        $cSecretUID=$request->getCookie('SecretUID');  if (!isset($cSecretUID)) { $cSecretUID=$session->get('SecretUID'); };  //如没有Cookie的SecretUID，就获取Session的SecretUID；
        $cSecretUKEY=$request->getCookie('SecretUKEY');  if (!isset($cSecretUKEY)) { $cSecretUKEY=$session->get('SecretUKEY'); };  //如没有Cookie的SecretUKEY，就获取Session的SecretUKEY；
        if (!isset($cSecretUID)) { $cSecretUID=''; };  if (!isset($cSecretUKEY)) { $cSecretUKEY=''; };  $cSecretUID=trim($cSecretUID);  $cSecretUKEY=trim($cSecretUKEY);  
        //01.检验SecretUID或SecretUKEY是否为空白
        if ($cSecretUID === null or $cSecretUID === '' or $cSecretUKEY === null or $cSecretUKEY === '') {
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkLogin']=-1;  //-1：验证失败；
            return $Data;  //返回验证结果；
        }
        //02.预处理AdminUserConfig文件；
        $cAdminUserConfig_file = ROOTPATH . getenv('AdminUserConfigPath') . getenv('AdminUserConfig');  //AdminUserConfig配置文件路径名；
        if (!file_exists($cAdminUserConfig_file)) {  //处理文件不存在的情况；
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkLogin']=-1;  //-1：验证失败；
            return $Data;  //返回验证结果；
        };
        //03.读取解析AdminUserConfig文件；
        $cAdminUsers = json_decode(file_get_contents($cAdminUserConfig_file), true);
        if (!isset($cAdminUsers)) {  //处理解析失败的情况；
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkLogin']=-1;  //-1：验证失败；
            return $Data;  //返回验证结果；
        };
        //04.开始遍历用户信息进行验证；
        foreach ($cAdminUsers as $cAdminUser) {
            if ( $this->_Get_PassSHA256($cAdminUser['Username'],True) == strtoupper($cSecretUID) &&  $this->_Get_PassSHA512($cAdminUser['Password'],True) == strtoupper($cSecretUKEY) ) {
                if (!$cAdminUser['Disable']) {
                    $cAdminUserName = Trim($cAdminUser['Username']);
                    $cAdminUserSHA256 = $this->_Get_PassSHA256($cAdminUser['Username'],True);  //计算用户唯一字串
                    $Data['xFWAdminUserUsername'] = $cAdminUserName;  //缓存用户名；
                    $Data['xFWAdminUserNickname']  = Trim($cAdminUser['Nickname']) ?? Trim($cAdminUser['Username']);  //缓存用户昵称；
                    $Data['xFWAdminUserDescription']  = Trim($cAdminUser['Description']) ?? '';  //缓存用户描述；
                    $Data['xFWAdminUserPermission']  = Trim($cAdminUser['Permission']) ?? '[Null]';  //缓存用户权限；
                };
                break;
            }
        }
        //05.如果遍历完所有用户信息都没有匹配到，则输出错误信息；
        if (!isset($cAdminUserName)) {
            delete_cookie('SecretUID');  delete_cookie('SecretUKEY');  unset($_SESSION['SecretUID']);  unset($_SESSION['SecretUKEY']);  //删除用户登录Cookie和Session
            $Data['xFWChkLogin']=-1;  //-1：验证失败；
            return $Data;  //返回验证结果；
        }
        $Data['xFWChkLogin']=0;  //0：验证成功；
        return $Data;  //返回验证结果；
    }  // function::_ChkAuthenticate [END]

}
