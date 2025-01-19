<script src="<?php echo i_static(); ?>/js/jquery.lazyload.js"></script>
<script src="<?php echo i_static(); ?>/iconfont/iconfont.js"></script>
<script src="<?php echo i_static(); ?>/js/theme.js"></script>
<script src="<?php echo i_static(); ?>/js/SmoothScroll.js"></script>
<script><?php if(get_option("i_custom_js_footer")){echo get_option("i_custom_js_footer");}; ?></script>
<?php if(get_option("i_custom_html_tongji")){echo get_option("i_custom_html_tongji");}; ?>

<script type="text/javascript"> 
    // 延迟加载
    jQuery(function() {        
        jQuery("img").lazyload({
            effect : "fadeIn",
            failure_limit : 50,
            threshold : 200,
        });
    });
    console.log('%c iFalsePlus %c https://github.com/limulu24/iFalsePlus', 'background: linear-gradient(120deg,rgb(52, 252, 255), #34DAFF);color:#fff;border-radius:2px;', '');
    console.log('<?php echo get_num_queries(); ?> queries in <?php timer_stop(7); ?>s');
</script>