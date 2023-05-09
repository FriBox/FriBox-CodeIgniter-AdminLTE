<!DOCTYPE html>
<html lang="<?=$xFWLang?>" >
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <meta name="keywords" content="<?=lang('default.txt_Keywords')?>">
        <meta name="Author" Content="<?=lang('default.txt_Author')?>">
        <meta name="Copyright" Content="<?=lang('default.txt_Copyright')?>">
        <meta name="description" content="<?=lang('default.txt_Description')?>" />
        <title><?=lang('default.txt_Appname')?></title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-pro@4.5.11/400.css">

        <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
        <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <link href="/css/bootstrap-icons.min.css" type="text/css" rel="stylesheet">
        <link href="/css/style.base.css?Status=<?php echo rand(10000, 99999);?>" type="text/css" rel="stylesheet">
    </head>

<body>
    <div class="pagemain">
        <!-- Login -->

            <div class="login-logo">FriBox CodeIgniter AdminLTE</div>
            
            <script type="text/javascript">
                function SwitchLang() {  //切换语言
                    var xLang = document.getElementById("form-Lang").value;
                    if (xLang.toLowerCase()=="<?=$xFWLang?>".toLowerCase()) { return false; exit(); }
                    var xhr = new XMLHttpRequest();
                    var url = window.location.protocol+'//'+window.location.host+'/Language?l='+xLang;
                    xhr.open('GET', url); xhr.responseType = 'json';  xhr.send();  xhr.onload = function() {
                        if (xhr.status === 200) { window.location.reload(); return true; exit(); } else { return false; exit(); }
                    }
                }

                function check_vUser() {
                    //检查用户名
                    var xText= document.getElementById("LoginErrorText");
                    var OutPutK= document.getElementById("vUser");
                    var OutPut = OutPutK.value;
                    var reg = /^[a-zA-Z]([-_a-zA-Z0-9-_]{3,64})$/; //字母开头，大小写英文加数字加横线和下划线，长度4到64。
                    if(!reg.test(OutPut)){
                        xText.innerHTML = "<?=lang('default.txt_UsernameValidation')?>";
                        return false; exit();//输入用户名错误
                    } else {
                        xText.innerHTML =""; return true;
                    }
                }

                function check_vPass() {
                    //检查密码
                    var xText= document.getElementById("LoginErrorText");
                    var OutPutK= document.getElementById("vPass");
                    var OutPut = OutPutK.value;
                    var reg = /^[a-zA-Z]([-_a-zA-Z0-9-_]{3,64})$/; //字母开头，大小写英文加数字加横线和下划线，长度4到64。
                    if(!reg.test(OutPut)){
                        xText.innerHTML = "<?=lang('default.txt_PasswordValidation')?>";
                        return false; exit();//输入密码错误
                    } else {
                        xText.innerHTML =""; return true;
                    }
                }

                function login() {
                    //提交用户名密码
                    flag=false;
                    OutPutV_A=check_vUser();
                    if (OutPutV_A==false) {
                        return false; exit();
                    }
                    OutPutV_B=check_vPass();
                    if (OutPutV_B==false) {
                        return false; exit();
                    }
                    if (OutPutV_A==true && OutPutV_B==true) {
                        return true;
                    } else {
                        return false; exit();//数据提交错误
                    }
                }
            </script>

            <div class="login-main">
                <form name="LoginForm" action="/Admin/Login" method="post" onsubmit="return login(this);">
                    <div class="login-from">

                            <p class="form-label"><i class="bi bi-person"></i>&nbsp;<?=lang('default.txt_Username')?>:</p>
                            <input type="text" name="vUser" id="vUser" class="form-control" maxlength="64" onfocusout="check_vUser();" title="<?=lang('default.txt_UsernameHint')?>" data-bs-toggle="tooltip" value="<?=$xFWUser?>" data-placement="bottom" placeholder=""><br>
                            
                            <p class="form-label"><i class="bi bi-key"></i>&nbsp;<?=lang('default.txt_Password')?>:</p>
                            <input type="password" name="vPass" id="vPass" class="form-control" onfocusout="check_vPass();" title="<?=lang('default.txt_PasswordHint')?>" data-bs-toggle="tooltip" maxlength="64" value="" data-placement="bottom" placeholder="" autocomplete><br>

                            <p class="form-label"><i class="bi bi-globe2">&nbsp;</i><?=lang('default.txt_SwitchLang')?>:</p>
                            <select id="form-Lang" class="form-select" aria-label="<?=lang('default.txt_SwitchLang')?>" style="width:200px;display:inline-block;margin-top: 2px;" onchange="SwitchLang()" title="<?=lang('default.txt_SwitchLang')?>" >
                                <option value="zh-CN" <?php if($xFWLang=='zh-CN') echo 'selected'; ?>><?=lang('default.txt_Language_zh-CN')?></option>
                                <option value="zh-TW" <?php if($xFWLang=='zh-TW') echo 'selected'; ?>><?=lang('default.txt_Language_zh-TW')?></option>
                                <option value="en" <?php if($xFWLang=='en') echo 'selected'; ?>><?=lang('default.txt_Language_en')?></option>
                                <option value="de" <?php if($xFWLang=='de') echo 'selected'; ?>><?=lang('default.txt_Language_de')?></option>
                            </select>

                            <button type="submit" name="LoginRun" id="LoginRun" class="btn btn-outline-success" style="float:right;margin-top:1px;padding-left:12px;padding-right:12px;" ><i class="bi bi-check-circle"></i>&nbsp;&nbsp;<?=lang('default.txt_Login')?></button>
                            <br>

                            <p id="LoginErrorText" class="LoginErrorText" name="LoginErrorText" ><b><?=$xFWErr?></b></p>

                    </div>
                </form>
            </div> 
            <div class="login-Copyright">
                <span class="login-Copyright-txt"><?=lang('default.txt_Copyright')?></span>
                <a href="http:/FriBox.cn/" target=_blank ><i class="bi bi-star" style="font-size:16px;line-height:22px;float:right;padding-right:5px;"  title="FriBox China" data-bs-toggle="tooltip" data-bs-placement="left"></i></a>
            </div>
                
    </div>

    <script type="text/javascript">
        //显示tooltip
        var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    
    </body>
</html>
<!-- <?=$xFWName?> v<?=$xFWVer?> ; Page rendered in {elapsed_time} seconds ; Default language is <?=$_ENV['APP_LOCALE'] ?> ; -->