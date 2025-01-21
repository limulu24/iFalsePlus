<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/static/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?ver=<?php echo filemtime(get_template_directory() . '/style.css'); ?>" type="text/css" media="all">
<div class="container-full nav-bar header <?php if(get_option("i_header_hidden") == 1) {echo 'header-hidden';} ?>">
    <div class="left">
        <?php if(get_option("i_logo_hidden") == 1) {} else { ?>
            <a href="<?php bloginfo('url') ?>" rel="home" class="logo">
                <img class="logo-light" src="<?php if(get_option("i_logo_url_light")){echo get_option("i_logo_url_light");}else{site_icon_url();}; ?>" alt="">
                <img class="logo-night" style="display:none" src="<?php if(get_option("i_logo_url_night")){echo get_option("i_logo_url_night");}else{site_icon_url();}; ?>" alt="">
                <script>
                    const logo_light = document.querySelector('.nav-bar .logo .logo-light');
                    const logo_night = document.querySelector('.nav-bar .logo .logo-night');

                    function getCookie(name){
                    	var nameEQ = name + "=";
                    	var ca = document.cookie.split(';');
                    	for(var i=0;i < ca.length;i++) {
                    		var c = ca[i].trim();
                    		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                    	}
                    	return null;
                    }
                    if (getCookie("night") == "1") {
                        logo_light.style.display = "none";
                        logo_night.style.display = "block";            
                    } else {
                        logo_light.style.display = "block";
                        logo_night.style.display = "none";
                    }
                </script>
            </a>
        <?php } ?>
        <?php 
            wp_nav_menu(array( 
                'theme_location'  => 'menu',
                'container_id'    => 'nav',
                'container_class' => 'nav',
                'menu_id'         => 'nav-menu',
                'menu_class'      => 'nav-menu',
                'fallback_cb'     => 'nav_fallback'
            ) );
        ?>
    </div>
    <?php if(get_option("i_login_hidden") != 1 || is_user_logged_in()){ ?>
        <div class="right">
            <?php if (is_user_logged_in()) { ?>
                <div class="admin">
                    <?php echo get_user_avatar(); ?>
                </div>
                <div class="user-menu">
                    <?php if(current_user_can('level_7')) { ?>
                        <a href="<?php bloginfo('url') ?>/wp-admin"><span class="iconfont icon-shezhi"></span> 后台管理</a>
                    <?php } ?>
                    <?php if(current_user_can('level_1')) { ?>
                        <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php"><span class="iconfont icon-weibiaoti--"></span> 发布文章</a>
                        <a href="<?php bloginfo('url') ?>/wp-admin/post-new.php?post_type=shuoshuo"><span class="iconfont icon-xiaoxi2"></span> 发表说说</a>
                    <?php } ?>
                    <a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><span class="iconfont icon-user"></span> 个人资料</a>
                    <a class="logout" href="<?php echo wp_logout_url(); ?>"><span class="iconfont icon-tuichu1"></span> 退出登录</a>
                </div>
            <?php ;} else { ?>
                <a href="<?php echo wp_login_url(); ?>" class="login"><span class="iconfont icon-User"></span></a>
            <?php ;} ?>
        </div>
    <?php } ?>
</div>
<?php i_header_mb(); ?>

<div class="change-night change-night-pc" onclick="switchNightMode();nightBtn();"><span class="iconfont"></span></div>

<div class="progress-wrap"><svg><path></svg></div>

<script src="<?php echo i_static(); ?>/js/headroom.min.js"></script>
<!-- 公告 -->
<?php if(should_show_notice()): ?>
<style>
.notice-modal {
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  pointer-events: none;
  visibility: hidden; /* 初始完全隐藏 */
  transition: opacity 0.3s ease, visibility 0.3s;
}

.notice-overlay {
  position: absolute;
  width: 100%;
  height: 100%;
  backdrop-filter: blur(8px);
  background-color: rgba(0,0,0,0.2);
}

.notice-content {
  position: relative;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

.notice-body {
  position: relative;
  background: var(--card-background, #fff);
  padding: 30px;
  width: 90%;
  max-width: 500px;
  border-radius: 16px;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  transform: translateY(30px);
  opacity: 0;
  transition: transform 0.3s ease, opacity 0.3s ease;
}

.notice-modal.ready {
  pointer-events: auto;
}

.notice-modal.show {
  opacity: 1;
}

.notice-modal.show .notice-body {
  transform: translateY(0);
  opacity: 1;
}

.notice-body p {
  margin: 0 0 15px;
  line-height: 1.6;
}

.notice-body img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  margin: 10px 0;
}

.notice-close {
  display: block;
  width: 100%;
  margin-top: 20px;
  padding: 12px;
  border: none;
  border-radius: 8px;
  background: var(--theme-color, #28FFF5);
  color: var(--text-color, #333);
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s ease;
}

.notice-close:hover {
  opacity: 0.9;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* 深色模式适配 */
[data-theme="dark"] .notice-body {
  background: var(--card-background-dark, #2d2d2d);
}

[data-theme="dark"] .notice-close {
  background: var(--theme-color-dark, #1a1a1a);
  color: var(--text-color-dark, #fff);
}

/* 移动端适配 */
@media (max-width: 768px) {
  .notice-body {
    width: 85%;
    padding: 25px;
  }
  
  .notice-close {
    padding: 10px;
    font-size: 14px;
  }
}
</style>

<div class="notice-modal" id="noticeModal">
  <div class="notice-overlay"></div>
  <div class="notice-content">
    <div class="notice-body">
      <?php echo wpautop(get_option('i_notice_content')); ?>
      <?php if(get_option('i_notice_always_show') != '1'): ?>
        <button class="notice-close" onclick="closeNotice()">我知道了，不再提醒</button>
      <?php else: ?>
        <button class="notice-close" onclick="closeNotice()">关闭</button>
      <?php endif; ?>
    </div>
  </div>
</div>

<script>
// 等待页面完全加载后再显示公告
window.addEventListener('load', function() {
  const modal = document.getElementById('noticeModal');
  if(!modal) return;

  // 延迟3秒显示公告
  setTimeout(() => {
    requestAnimationFrame(() => {
      modal.style.visibility = 'visible';
      modal.classList.add('ready');
      requestAnimationFrame(() => {
        modal.classList.add('show');
      });
    });
  }, 3000);
  
  // ESC键关闭
  document.addEventListener('keydown', function(e) {
    if(e.key === 'Escape') closeNotice();
  });
});

function closeNotice() {
  const modal = document.getElementById('noticeModal');
  if(!modal) return;
  
  modal.classList.remove('show');
  
  setTimeout(() => {
    modal.classList.remove('ready');
    modal.style.visibility = 'hidden';
    <?php if(get_option('i_notice_always_show') != '1'): ?>
      setCookie();
    <?php endif; ?>
  }, 300);
}

function setCookie() {
  const hours = <?php echo absint(get_option('i_notice_cookie_time', 24)); ?>;
  if(hours < 1) return;
  
  const expireTime = Math.floor(Date.now() / 1000) + (hours * 60 * 60);
  const lastModified = <?php echo get_option('i_notice_last_modified', '0'); ?>;
  
  document.cookie = 'notice_displayed=' + expireTime + ':' + lastModified + '; path=/';
}
</script>
<?php endif; ?>
<!-- 公告END -->
 <!--动画div-->
<body>
    <div class="page-loading">
        <div class="loading-icon"></div>
    </div>
</body>
<!--动画divEND-->
