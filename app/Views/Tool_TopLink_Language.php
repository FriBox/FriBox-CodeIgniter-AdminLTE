
        <!-- 顶部工具栏  语言切换  开始 -->
        <script type="text/javascript">
            function SwitchLang(xLang) {  //切换语言
                if (xLang.toLowerCase()=="<?=$xFWLang?>".toLowerCase()) { return false; exit(); }
                var xhr = new XMLHttpRequest();
                var url = window.location.protocol+'//'+window.location.host+'/Language?l='+xLang;
                xhr.open('GET', url); xhr.responseType = 'json';  xhr.send();  xhr.onload = function() {
                    if (xhr.status === 200) { window.location.reload(); return true; exit(); } else { return false; exit(); }
                }
            }
        </script>
        <span style="padding-left:0px;padding-right:2px; display:inherit; align-items:center; cursor: default;" title="<?=lang('default.txt_SwitchLanguage')?>" >🌐</span>
        <a class="slidingLink" id="ToolsBar-Lang-zh-CN" href="javascript: void(0)" onclick="SwitchLang('zh-CN')" title="zh-CN" ><?=lang('default.txt_Language_zh-CN')?></a>
        <a class="slidingLink" id="ToolsBar-Lang-zh-TW" href="javascript: void(0)" onclick="SwitchLang('zh-TW')" title="zh-TW" ><?=lang('default.txt_Language_zh-TW')?></a>
        <a class="slidingLink" id="ToolsBar-Lang-en" href="javascript: void(0)" onclick="SwitchLang('en')" title="en" ><?=lang('default.txt_Language_en')?></a>
        <a class="slidingLink" id="ToolsBar-Lang-de" href="javascript: void(0)" onclick="SwitchLang('de')" title="de" ><?=lang('default.txt_Language_de')?></a>
        <!-- 顶部工具栏  语言切换  结束 -->
