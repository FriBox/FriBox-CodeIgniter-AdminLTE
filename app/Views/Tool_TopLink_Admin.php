
        <!-- 顶部工具栏  管理控制台  开始 -->
        <?php
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                $vTmpUrl = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            } else {
                $vTmpUrl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            }
        ?>
        <span style="padding-left:0px;padding-right:2px; display:inherit; align-items:center; cursor: default;" title="<?=lang('default.txt_Admin')?>" >⚙️</span>
        <a class="slidingLink" href="/Admin"  title="<?=$vTmpUrl?>Admin" target="_blank" ><?=lang('default.txt_Admin')?></a>
        <!-- 顶部工具栏  管理控制台  结束 -->
