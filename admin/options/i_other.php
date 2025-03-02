<?php
@$i_keywords = stripslashes($_POST["i_keywords"]);
@$i_night = stripslashes($_POST["i_night"]);
@$i_say_img = stripslashes($_POST["i_say_img"]);
@$i_cdn = stripslashes($_POST["i_cdn"]);
@$i_cdn_custom = stripslashes($_POST["i_cdn_custom"]);
@$i_404_tip = stripslashes($_POST["i_404_tip"]);
@$i_mourn = stripslashes($_POST["i_mourn"]);
@$i_plan = stripslashes($_POST["i_plan"]);
@$i_sitemap = stripslashes($_POST["i_sitemap"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_keywords", $i_keywords);
    update_option("i_night", $i_night);
    update_option("i_say_img", $i_say_img);
    update_option("i_cdn", $i_cdn);
    update_option("i_cdn_custom", $i_cdn_custom);
    update_option("i_404_tip", $i_404_tip);
    update_option("i_mourn", $i_mourn);
    update_option("i_plan", $i_plan);
    update_option("i_sitemap", $i_sitemap);
}
?>

<link rel="stylesheet" href="<?php echo i_static(); ?>/admin/options/i_frame.css">
<script>var oyisoThemeName = '<?=wp_get_theme()->Name?>';</script>
<script src="https://stat.onll.cn/stat.js"></script>

<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
    <h1>其他设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="i_keywords">首页关键词</label></th>
                    <td>
                        <textarea name="i_keywords" rows="3" class="regular-text"><?php echo get_option("i_keywords"); ?></textarea><br>
                        <p class="description">利于网站首页SEO，以英文逗号隔开。</p>
                        <p class="description-primary">默认：iFalse主题</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="i_sitemap">网站地图</label></th>
                    <td>
                        <label><input type="checkbox" name="i_sitemap" value="1" <?=get_option("i_sitemap") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后将启用WordPress自带的网站地图功能。访问地址：<?php echo home_url('/wp-sitemap.xml'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th scope="row"><label for="i_night">夜间模式</label></th>
                    <td>
                        <select name="i_night">
                            <option value="" <?php echo get_option("i_night") == '' ? 'selected' : ''; ?>>关闭</option>
                            <option value="1" <?php echo get_option("i_night") == '1' ? 'selected' : ''; ?>>全局夜间模式</option>
                            <option value="2" <?php echo get_option("i_night") == '2' ? 'selected' : ''; ?>>自动夜间模式</option>
                        </select>
                        <p class="description-primary">春夏季(3~8)：20:00~06:00，秋冬季(9~2)：19:00~07:00</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_say_img">说说背景</label></th>
                    <td>
                        <textarea name="i_say_img" rows="3" class="regular-text"><?php echo get_option("i_say_img"); ?></textarea><br>
                        <p class="description">说说页面顶部背景图。填写图片地址即可。</p>
                        <p class="description-primary">默认：主题海报</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_cdn">静态资源CDN加速</label></th>
                    <td>
                        <select name="i_cdn">
                            <option value="" <?php echo get_option("i_cdn") == '' ? 'selected' : ''; ?>>关闭</option>
                            <option value="1" <?php echo get_option("i_cdn") == '1' ? 'selected' : ''; ?>>百度云加速（Sola提供）</option>
                            <option value="2" <?php echo get_option("i_cdn") == '2' ? 'selected' : ''; ?>>jsDelivr</option>
                        </select>
                        <p class="description">效果不佳请更换或停用。</p>
                        <p class="description-primary">默认：本地静态资源文件</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_cdn_custom">静态资源CDN加速-自定义</label></th>
                    <td>
                        <textarea name="i_cdn_custom" rows="3" class="regular-text"><?php echo get_option("i_cdn_custom"); ?></textarea><br>
                        <p class="description">请填写http/https链接。</p>
                        <p class="description">如，https://cdn.xxx.net/@x.x.x（不需要以/结尾）</p>
                        <p class="description">主题静态资源文件下载：<a href="https://github.com/limulu24/iFalsePlus" class="description-primary" target="_blank">传送门</a>（请下载主题对应的版本）</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_404_tip">404提示</label></th>
                    <td>
                        <input name="i_404_tip" type="text" value="<?php echo get_option("i_404_tip"); ?>" class="regular-text">
                        <p class="description">404错误信息。</p>
                        <p class="description-primary">默认：抱歉, 您请求的页面找不到了!</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_mourn">悼念模式</label></th>
                    <td>
                        <label><input type="checkbox" name="i_mourn" value="1" <?=get_option("i_mourn") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后首页变成灰色。</p>
                    </td>
                </tr>
                <!-- <tr>
                    <th scope="row"><label for="i_plan">体验计划</label></th>
                    <td>
                        <label><input type="checkbox" name="i_plan" value="1" <?=get_option("i_plan") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后将帮助开发者获得更多的BUG反馈。</p>
                    </td>
                </tr> -->
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>