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
        <style type="text/css">
            <?=lang('default.css_LinkFont')?> 
            body { <?=lang('default.css_BodyFont')?> }
        </style>

    </head>
    <body>
        <div style="position:absolute; top:45%; left:50%; transform:translate(-50%,-50%); width: 820px;text-align: center;"><?=$xFWName?> v<?=$xFWVer?> &nbsp;( with PHP v<?=$xPHPVer?> / CodeIgniter v<?=$xCIVer?> , Current language = <?=$xFWLang?> )</div>
        <?php include('Tool_TopLink.php'); ?>
    </body>
</html>
<!-- <?=$xFWName?> v<?=$xFWVer?> ; Page rendered in {elapsed_time} seconds ; Default language is <?=$_ENV['APP_LOCALE'] ?> ; -->
