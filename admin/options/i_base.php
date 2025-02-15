<?php
@$i_plane = stripslashes($_POST["i_plane"]);
@$i_color = stripslashes($_POST["i_color"]);
@$i_color_sub = stripslashes($_POST["i_color_sub"]);
@$i_blog_to_column = stripslashes($_POST["i_blog_to_column"]);
@$i_blog_auto_column = stripslashes($_POST["i_blog_auto_column"]);
@$i_loading_pic = stripslashes($_POST["i_loading_pic"]);
@$i_login = stripslashes($_POST["i_login"]);
@$i_register_turn = stripslashes($_POST["i_register_turn"]);
@$i_forget_turn = stripslashes($_POST["i_forget_turn"]);
@$i_logo_mobile = stripslashes($_POST["i_logo_mobile"]);
@$i_mobile_slogan = stripslashes($_POST["i_mobile_slogan"]);
@$i_disable_wp_update = stripslashes($_POST["i_disable_wp_update"]);
@$i_notice_enabled = stripslashes($_POST["i_notice_enabled"]);
@$i_notice_content = stripslashes($_POST["i_notice_content"]);
@$i_notice_cookie_time = stripslashes($_POST["i_notice_cookie_time"]);
@$i_notice_always_show = stripslashes($_POST["i_notice_always_show"]);
@$i_ads_article_bottom_enabled = stripslashes($_POST["i_ads_article_bottom_enabled"]);
@$i_ads_article_bottom_code = stripslashes($_POST["i_ads_article_bottom_code"]);
@$i_ads_home_banner_enabled = stripslashes($_POST["i_ads_home_banner_enabled"]);
@$i_ads_home_banner_code = stripslashes($_POST["i_ads_home_banner_code"]);

if(@stripslashes($_POST["i_opt"])){
    update_option("i_plane", $i_plane);
    update_option("i_color", $i_color);
    update_option("i_color_sub", $i_color_sub);
    update_option("i_blog_to_column", $i_blog_to_column);
    update_option("i_blog_auto_column", $i_blog_auto_column);
    update_option("i_loading_pic", $i_loading_pic);
    update_option("i_login", $i_login);
    update_option("i_register_turn", $i_register_turn);
    update_option("i_forget_turn", $i_forget_turn);
    update_option("i_logo_mobile", $i_logo_mobile);
    update_option("i_mobile_slogan", $i_mobile_slogan);
    update_option("i_disable_wp_update", $i_disable_wp_update);     
    // 更新公告设置
    update_option("i_notice_enabled", $i_notice_enabled);
    update_option("i_notice_content", $i_notice_content);
    update_option("i_notice_cookie_time", $i_notice_cookie_time);
    update_option("i_notice_always_show", $i_notice_always_show);
    
    // 如果公告内容变化或状态改变，更新修改时间
    if($i_notice_content !== get_option('i_notice_content') || 
       ($i_notice_enabled === '1' && get_option('i_notice_enabled') === '0')) {
        update_option('i_notice_last_modified', time());
    }
    
    // 更新广告设置
    update_option("i_ads_article_bottom_enabled", $i_ads_article_bottom_enabled);
    update_option("i_ads_article_bottom_code", $i_ads_article_bottom_code);
    update_option("i_ads_home_banner_enabled", $i_ads_home_banner_enabled);
    update_option("i_ads_home_banner_code", $i_ads_home_banner_code);
}
?>

<link rel="stylesheet" href="<?php echo i_static(); ?>/admin/options/i_frame.css">
<script>var oyisoThemeName = '<?=wp_get_theme()->Name?>';</script>
<script src="https://stat.onll.cn/stat.js"></script>

<?php if(get_option("i_color")){echo "<style>.description-primary{color:".get_option("i_color").";}</style>";}; ?>
<div class="wrap">
    <h1>基本设置</h1>
    <form method="post" action="" novalidate="novalidate">
        <table class="form-table">
            <tbody>
            <tr>
    <th scope="row"><label for="i_color">主题主色</label></th>
    <td>
        <!-- 主色选择器 -->
        <input name="i_color" type="color" id="i_color_picker" value="<?= get_option("i_color") ? get_option("i_color") : '#28FFF5' ?>" class="regular-text">
        
        <!-- 当前主色和默认主色的颜色块 -->
        <p class="description" style="display:flex;align-items:center">
            当前主题主色：<span style="display:inline-block;width:15px;height:15px;background-color:<?php if(get_option("i_color")){echo get_option("i_color"); }else {echo "#28FFF5";} ?>;border-radius:2px"></span>
            <span style="padding-left:30px;display:flex;align-items:center">
                默认：<span style="display:inline-block;width:15px;height:15px;background-color:#28FFF5;border-radius:2px"></span>
            </span>
        </p>
        
        <!-- 描述信息 -->
        <p class="description-primary">只填写主色时，副色将使用主色</p>
        <p class="description-primary">默认主色HEX值：#28FFF5</p>
        
        <!-- 重置主色按钮 -->
        <button type="button" id="reset_main_color" class="button">重置主色为默认</button>
    </td>
</tr>

<tr>
    <th scope="row"><label for="i_color_sub">主题副色</label></th>
    <td>
        <!-- 副色选择器 -->
        <input name="i_color_sub" type="color" id="i_color_sub_picker" value="<?= get_option("i_color_sub") ? get_option("i_color_sub") : '#58b3f5' ?>" class="regular-text">
        
        <!-- 当前副色和默认副色的颜色块 -->
        <p class="description" style="display:flex;align-items:center">
            当前主题副色：<span style="display:inline-block;width:15px;height:15px;background-color:
            <?php 
                if(get_option("i_color")){
                    if(get_option("i_color_sub")){
                        echo get_option("i_color_sub"); 
                    }else if(get_option("i_color") && !get_option("i_color_sub")) {
                        echo get_option("i_color");
                    }else {
                        echo "#58b3f5";
                    }
                }else if(!get_option("i_color") && get_option("i_color_sub")) {
                    echo "#58b3f5";
                } else {
                    echo "#58b3f5";
                }
            ?>
            ;border-radius:2px"></span>
            <span style="padding-left:30px;display:flex;align-items:center">
                默认：<span style="display:inline-block;width:15px;height:15px;background-color:#58b3f5;border-radius:2px"></span>
            </span>
        </p>
        
        <!-- 描述信息 -->
        <p class="description-primary" style="margin-bottom:6px">默认副色HEX值：#58b3f5</p>
        
        <!-- 重置副色按钮 -->
        <button type="button" id="reset_sub_color" class="button">重置副色为默认</button>
    </td>
</tr>

<!-- JavaScript 重置功能 -->
<script>
    // 重置主色为默认颜色
    document.getElementById('reset_main_color').addEventListener('click', function() {
        document.getElementById('i_color_picker').value = '#28FFF5';
    });

    // 重置副色为默认颜色
    document.getElementById('reset_sub_color').addEventListener('click', function() {
        document.getElementById('i_color_sub_picker').value = '#58b3f5';
    });
</script>

                <tr>
                    <th scope="row"><label for="i_plane">面性样式</label></th>
                    <td>
                        <label><input type="checkbox" name="i_plane" value="1" <?=get_option("i_plane") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后局部样式由线性转为面性。</p>
                        <p class="description-primary">默认：线性样式</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_blog_to_column">博客模式</label></th>
                    <td>
                        <label><input type="checkbox" name="i_blog_to_column" value="1" <?=get_option("i_blog_to_column") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后首页切换成博客模式（双栏模式）。</p>
                        <p class="description-primary">默认：卡片模式</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_blog_auto_column">移动端自动博客模式</label></th>
                    <td>
                        <label><input type="checkbox" name="i_blog_auto_column" value="1" <?=get_option("i_blog_auto_column") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后PC端不变，移动端切换成博客模式。</p>
                        <p class="description-primary">PC端：卡片模式</p>
                        <p class="description-primary">手机端：博客模式</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_loading_pic">懒加载图</label></th>
                    <td>
                        <textarea name="i_loading_pic" rows="3" class="regular-text"><?=get_option("i_loading_pic")?></textarea><br>
                        <p class="description">图片未加载出时显示。</p>
                        <p class="description-primary">默认：主题自带GIF加载图</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_login">登录/注册/找回密码模板</label></th>
                    <td>
                        <label><input type="checkbox" name="i_login" value="1" <?=get_option("i_login") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后使用主题模板。</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_register_turn">用户注册</label></th>
                    <td>
                        <label><input type="checkbox" name="i_register_turn" value="1" <?=get_option("i_register_turn") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后运行用户注册。</p>
                        <p class="description-primary">仅用于主题注册模板，如需完全关闭请前往WP设置</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="i_forget_turn">找回密码</label></th>
                    <td>
                        <label><input type="checkbox" name="i_forget_turn" value="1" <?=get_option("i_forget_turn") == '1' ? 'checked' : ''?>>开启</label>
                        <p class="description">开启后用户可以使用找回密码功能。</p>
                        <p class="description-primary">仅用于主题找回密码模板</p>
                    </td>
                </tr>
                <!-- others功能 -->
                       <tr>                    
                     <th scope="row"><label for="i_notice_enabled">全局公告</label></th>
                         <td>
                    <label><input type="checkbox" name="i_notice_enabled" value="1" <?php checked(get_option('i_notice_enabled'), '1'); ?>>启用</label>
                     <p class="description">开启后将在全站显示公告弹窗</p>
                      <p class="description-primary">可用于显示网站通知等</p>
                       </td>
                          </tr>

                       <tr>
                    <th scope="row"><label for="i_notice_always_show">显示设置</label></th>
                         <td>
                    <label><input type="checkbox" name="i_notice_always_show" value="1" <?php checked(get_option('i_notice_always_show'), '1'); ?>>每次访问都显示</label>
                     <p class="description">开启后将忽略时间设置，每次访问页面都会显示公告</p>
                     <p class="description-primary">适用于重要通知</p>
                     </td>
                      </tr>

                   <tr>
                  <th scope="row"><label for="i_notice_content">公告内容</label></th>
                  <td>
                   <?php 
                  wp_editor(get_option('i_notice_content'), 'i_notice_content', array(
            'textarea_rows' => 5,
            'media_buttons' => true,
            'teeny' => true,
            'quicktags' => true,
            'tinymce' => array(
                'toolbar1' => 'bold,italic,underline,strikethrough,bullist,numlist,link,unlink,forecolor,undo,redo'
                        )
                        )); 
                       ?>
                  <p class="description">支持HTML代码和媒体文件</p>
                   <p class="description-primary">可以添加图片、链接等富媒体内容</p>
                   </td>
                  </tr>

                  <tr>
               <th scope="row"><label for="i_notice_cookie_time">不再提示时长</label></th>
                    <td>
                    <input type="number" name="i_notice_cookie_time" value="<?php echo esc_attr(get_option('i_notice_cookie_time', 24)); ?>" min="1" step="1" class="small-text"> 小时
                  <p class="description">访客关闭公告后多长时间内不再显示</p>
                  <p class="description-primary">最小1小时，仅在未开启"每次访问都显示"时生效</p>
                   </td>
                     </tr>

                    <?php settings_errors('i_notice_settings'); ?>
                         <tr>
                      <th scope="row">文章底部广告</th>
                         <td>
                         <label>
                      <input type="checkbox" name="i_ads_article_bottom_enabled" value="1" <?php checked(get_option('i_ads_article_bottom_enabled'), '1'); ?>>
                             启用
                         </label>
                       <p class="description">开启后将在文章底部显示广告</p>
                       <div style="margin-top: 10px;">
                        <textarea name="i_ads_article_bottom_code" rows="5" class="large-text code" placeholder="在此处粘贴广告代码"><?php echo esc_textarea(get_option('i_ads_article_bottom_code')); ?></textarea>
                        <p class="description">支持HTML代码，可放置广告联盟代码或自定义内容</p>
                       <p class="description-primary">建议控制广告尺寸，避免影响阅读体验</p>
                          </div>
                           </td>
                            </tr>

                            <tr>
                          <th scope="row">首页轮播下方广告</th>
                             <td>
                          <label>
                         <input type="checkbox" name="i_ads_home_banner_enabled" value="1" <?php checked(get_option('i_ads_home_banner_enabled'), '1'); ?>>
                             启用
                            </label>
                       <p class="description">开启后将在首页轮播图下方显示广告</p>
                       <div style="margin-top: 10px;">
                            <textarea name="i_ads_home_banner_code" rows="5" class="large-text code" placeholder="在此处粘贴广告代码"><?php echo esc_textarea(get_option('i_ads_home_banner_code')); ?></textarea>
                           <p class="description">支持HTML代码，可放置广告联盟代码或自定义内容</p>
                            <p class="description-primary">建议使用响应式广告代码</p>
                               </div>
                                 </td>
                                </tr>

                           <tr>
                      <th scope="row"><label for="i_logo_mobile">移动端 Logo</label></th>
                          <td>
                      <input class="regular-text" type="text" name="i_logo_mobile" value="<?php echo get_option('i_logo_mobile'); ?>" placeholder="请输入移动端 Logo 图片地址">
                      <p class="description">移动端侧边栏顶部显示的 Logo，留空则使用网站图标</p>
                     <p class="description-primary">支持任意图片URL地址</p>
                    </td>
                         </tr>

                       <tr>
                     <th scope="row"><label for="i_mobile_slogan">移动端标语</label></th>
                            <td>
                    <input class="regular-text" type="text" name="i_mobile_slogan" value="<?php echo get_option('i_mobile_slogan'); ?>" placeholder="请输入移动端显示的标语">
                    <p class="description">移动端侧边栏顶部显示的标语，留空则使用网站描述</p>
                    <p class="description-primary">建议简短精炼，突出特色</p>
                      </td>
                         </tr>

                         <tr>
                         <th scope="row"><label for="i_disable_wp_update">WordPress 更新</label></th>
                        <td>
                   <label><input type="checkbox" name="i_disable_wp_update" value="1" <?php checked(get_option('i_disable_wp_update'), '1'); ?>>禁用自动更新</label>
                   <p class="description">禁用 WordPress 版本的自动更新检查</p>
                  <p class="description-primary">启用后将禁用 WordPress 的更新检查功能</p>
                    <p class="description-primary">可以避免服务器频繁检查更新，提升性能</p>
                    </td>
                      </tr>

<!-- ---------------------------------------others功能END---------------------------------------------------------------------------- -->
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="i_opt"  class="button button-primary" value="保存更改">
        </p>
    </form>
</div>