
<!-- 右上角图标 与 顶部工具栏 开始 -->
<script type="text/javascript">
    function HideToolsBar() {  //隐藏ToolsBar
        var toolsBar = document.getElementById("ToolsBar-Bar");
        var toolsBarIcon = document.getElementById("ToolsBar-Icon");
        if(toolsBar.style.display === "none"){ toolsBar.style.display = "flex"; toolsBarIcon.style.display = "none"; } else { toolsBar.style.display = "none";  toolsBarIcon.style.display = "flex"; }
        return true; exit();
    }

    function ShowToolsBar() {  //显示ToolsBar
        var toolsBar = document.getElementById("ToolsBar-Bar");
        var toolsBarIcon = document.getElementById("ToolsBar-Icon");
        if(toolsBar.style.display === "flex"){ toolsBar.style.display = "none"; toolsBarIcon.style.display = "flex"; } else { toolsBar.style.display = "flex"; toolsBarIcon.style.display = "none"; }
        return true; exit();
    }
</script>
<style type="text/css">
    /* 右上角图标按钮 */
    .ToolsBarIcon-Img { width:75%; height:75%; position:absolute; border-radius:4px; top:50%; left:50%; transform:translate(-50%, -50%); }
    .ToolsBarIcon-Img:hover { box-shadow: 0 0 5px #048500;  -moz-box-shadow: 0 0 5px #048500;  -webkit-box-shadow: 0 0 5px #048500; }
    .ToolsBarIcon-Link { text-decoration:none;width:28px; height:28px; position:fixed; top:5px; right:5px; display:inline-block; background-color:#FFFFFF; box-shadow:0 0 4px #8f8f8f; -moz-box-shadow:0 0 4px #8f8f8f; -webkit-box-shadow:0 0 4px #8f8f8f; border-radius:4px; }
    /* 顶端工具栏 */
    .ToolsBar-Bar { display:none; position: fixed; top:0; left:0; right: 0; z-index: 10000; height: 38px; line-height: 36px; font-size: 16px; font-weight: 400; background-color: #FFFFFF; color:#959595; box-shadow: 0 0 4px #DFDFDF; -moz-box-shadow: 0 0 4px #DFDFDF; -webkit-box-shadow: 0 0 4px #DFDFDF; padding: 0 12px 0 12px; }
    /* 右端关闭按钮 */
    .ToolsBar-Close { width:14px; height:14px;border:2px solid #afafaf; border-radius:4px; text-align:center; line-height:14px; font-size:12px; font-weight: 600; color:#959595; text-decoration:none; }
    .ToolsBar-Close:hover { color:#606060;-webkit-text-stroke: 1px #959595; box-shadow: 0 0 2px #959595;  -moz-box-shadow: 0 0 2px #959595;  -webkit-box-shadow: 0 0 2px #959595; }
    .ToolsBar-Icon2 { font-size:14px; text-decoration:none; color:#959595; line-height:20px; width:55px; display:inherit; padding-right:12px; }
    .ToolsBar-LogoLink { padding-right:6px; display:inherit; align-items:center; }
    .ToolsBar-OpenClose { padding-right:6px; display:inherit; align-items:center; }
    /* 动态下划线 */
    .slidingLink { text-decoration:none; color:#5e5e5e; display: inline-block; position: relative; padding-left:8px; padding-right:8px; font-size: 14px; padding-top: 2px; }
    .slidingLink:after { content: ''; display: block; margin: auto; height: 2px; width: 0px; background: transparent; transition: width .5s ease, background-color .5s ease; margin-top: -6px; }
    .slidingLink:hover:after { width: 100%; background: #FF6928; }
 </style>
<div id="ToolsBar">
    <div id="ToolsBar-Icon"><a id="ToolsBarIcon-Link" class="ToolsBarIcon-Link" href="javascript:void(0);" onclick="ShowToolsBar()" title="<?=lang('default.txt_Open')?><?=lang('default.txt_ControlPanel')?>" ><img id="ToolsBarIcon-Img" class="ToolsBarIcon-Img" src='/favicon.ico'></img></a></div>
    <div id="ToolsBar-Bar" class="ToolsBar-Bar">
        <?php include('Tool_TopLink_Language.php'); ?>
        <span style="padding-left:24px;padding-right:28px; display:inherit; align-items:center; cursor: default; ">⋮⋮</span>
        <?php include('Tool_TopLink_Admin.php'); ?>
        <span style="float:right; margin-left:auto;"></span>
        <span style="padding-left:0px;padding-right:18px; display:inherit; align-items:center; cursor: default; ">⋮⋮</span>
        <span id="ToolsBar-LogoLink" class="ToolsBar-LogoLink"><a id="ToolsBar-Icon2" class="ToolsBar-Icon2" href="/" title="<?=lang('default.txt_Appname')?>" style=""><img src='/favicon.ico' style="width:20px; height:20px; border-radius:4px;"></img>&nbsp;&nbsp;v<?=$xFWVer?></a></span>
        <span id="ToolsBar-OpenClose" class="ToolsBar-OpenClose"><a id="ToolsBar-Close" class="ToolsBar-Close" href="javascript:void(0);" onclick="HideToolsBar()" title="<?=lang('default.txt_Open')?>/<?=lang('default.txt_Close')?>" >✕</a></span>
    </div>
</div>
<!-- 右上角图标 与 顶部工具栏 结束 -->
