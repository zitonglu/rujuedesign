<?php //基础列表页面
get_header();?>
 <div class="row mt-3">
    <div class="col-xl-10 col-12">
        <div class="container-fluid"><div class="row" id="masonry">
          <?php if (have_posts()){
            while ( have_posts()){
            the_post();
            get_template_part('content/content',get_post_format());
          }}?>
        </div></div><!-- container-fluid -->
    </div>
    <?php if(!wp_is_mobile()):?>
      <div class="col-xl-2 d-none d-xl-block" id="right-sider">
        <div class="theiaStickySidebar"><!-- 侧栏滚动 -->
          <?php //dynamic_sidebar(__('right-sider','rujuedesign'));右侧栏?>
          <div class="text-center mb-3">
            <img src="<?php bloginfo('template_url')?>/img/qrcode.jpg" alt="<?php _e('微信公众号','rujuedesign')?>" width="160px">
          </div>
          <?php 
            query_posts('pagename=message');
            while(have_posts()){
              the_post(); 
              comments_template();
            }
            wp_reset_query();
          ?>
        </div>
      </div><!-- 侧栏 end -->
    <?php endif?>
 </div>
<p class="text-center" id="nav-below"><?php _e('自动加载完成，这是底线','rujuedesign')?> <span id="older_posts"><?php next_posts_link(__('NextPage')) ?></span></p>
<?php page_list();//分页?>

<?php get_footer();?>