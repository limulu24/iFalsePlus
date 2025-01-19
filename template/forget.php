<?php
/*Template Name: 找回密码*/
?>

<?php i_frame(); ?>

<style>
    body {
        overflow: hidden;
    }
    .progress-wrap,
    .active-progress {
        display: none !important;
    }
</style>

<body>
    <?php
    if(get_option("i_forget_turn") == 1) {
    if(is_user_logged_in()) {        
        if(current_user_can('level_10')) {
            wp_redirect(home_url() . '/wp-admin', 302);
        } else {
            wp_redirect(home_url(), 302);
        }
    } else ?>
    <?php get_header(); ?>
    <div class="login-page">
        <div class="login-main">
            <img class="login-img" src="<?php echo get_template_directory_uri(); ?>/inc/random-img.php" alt="login">
            <div class="login-msg">
                <div class="forget-box">
                    <h2>找回密码！</h2>
                    <div class="des">Retrieve password!</div>
                    <p style="color:#D43030"></p>
                    <form name="lostpasswordform" method="POST" action="<?php home_url(); ?>/wp-login.php?action=lostpassword">
                        <div class="form-item form-email">
                            <span class="iconfont icon-email"></span>
                            <input type="email" name="user_login" placeholder="邮箱" size="20" required="required" autofocus />
                        </div>
                        <div class="form-other">
                        <?php if(get_option("i_register_turn") == 1) {echo '<span>还没有账户？<a href="' . home_url(). '/register">立即注册</a></span>';} else{} ?>
                            <span><a href="<?php home_url(); ?>/login">返回登录</a></span>
                        </div>
                        <div class="form-item">
                            <button type="submit" name="wp-submit">获取新密码</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php i_frame_js(); ?>
    <?php 
        } else {
            wp_redirect(home_url() . '/404', 302);
        }
    ?>
</body>
</html>