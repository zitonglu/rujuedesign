<footer class="pt-3 pb-3 text-center">
    © 2021-2022 <a target="_blank" href="//www.rujue.cn" title="<?php _e('海安儒爵软件开发工作室','rujuedesign')?>"><?php _e('海安儒爵软件开发工作室','rujuedesign')?></a> -    
    <a href="//beian.miit.gov.cn/" rel="nofollow" target="_blank"><?php echo get_option( 'get_ICP' );?></a><!--网站备案号-->
    <br>Powered By <a href="//cn.wordpress.org" rel="nofollow" target="_blank">WordPress</a>. Theme by <a href="//www.rujue.cn" target="_blank" title="<?php _e('海安儒爵软件开发工作室','rujuedesign')?>">RuJue.cn</a>
    <?php
        if (defined('XMLSF_VERSION')){
            echo ' - <a href="'.site_url().'/sitemap.xml" target="_blank" title="xml">SiteMap</a>';
        }
    ?> - <a href="<?php bloginfo('rdf_url'); ?>" target="_blank">RSS</a>
</footer>

</div><!-- container-fluid end -->

<!-- Bootstrap JS -->

<script src="<?php _echo_CDN_URL('bootstrap.min.js')?>" type="text/javascript"></script>

<!-- 菜单侧栏 -->
<script>$(document).ready(function(){
    $('#left-menu').sidr({name:'sidr-left',side:'left'});
    $('#right-menu').sidr({name:'sidr-right',side:'right'});
});</script>

<?php if(is_single() || is_page()): ?>
    <script>$(document).ready(function(){
        //改变single页面商品 JS
        $('.wp-block-media-text a').attr({'rel':'nofollow','target':'_blank'});
        $('.blocks-gallery-grid figure a').attr({'target':'_blank'});
    })</script>
    <script>$('.collapse').collapse('hide');//下载相关</script>
<?php else: ?>
    <!-- 无限下拉 JS -->
    <script src="<?php _echo_CDN_URL('infinitescroll.min.js')?>"></script>
    <!-- 加载图片 JS -->
    <script src="<?php _echo_CDN_URL('imagesloaded.min.js')?>"></script>
    <!-- 瀑布流 JS -->
    <script src="<?php _echo_CDN_URL('masonry.min.js')?>"></script>
    <!-- index JS -->
    <script src="<?php _echo_CDN_URL('index.js')?>"></script>
<?php endif?>

<?php if(!wp_is_mobile()): ?>
    <!-- 侧栏跟随 JS -->
    <script src="<?php _echo_CDN_URL('theia-sticky-sidebar.js')?>"></script>
    <script>$(document).ready(function(){$('#right-sider').theiaStickySidebar({additionalMarginTop:60});})</script>
<?php endif?>

<?php wp_footer(); ?>
<?php echo get_option('rujuedesign_bottom_JQ');?>

</body>
</html>
<!-- 网页打开时间：<?php timer_stop(1); ?>秒 -->
<!-- 调用数据库次数：<?php echo get_num_queries(); ?>次 -->