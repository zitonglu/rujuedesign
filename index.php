<?php //基础列表页面
get_header();?>
 <div class="row mt-3">
    <div class="col-sm-9 col-md-10 col-12">
        <div class="container-fluid"><div class="row" id="masonry">
          <?php if (have_posts()){
            while ( have_posts()){
            the_post();
            get_template_part('content/content',get_post_format());
          }}?>
        </div></div><!-- container-fluid -->
    </div>
    <?php if(!wp_is_mobile()):?>
      <div class="col-sm-3 col-md-2 col-12">
        <div class="theiaStickySidebar">
          <?php dynamic_sidebar(__('right-sider','rujuedesign'));//右侧栏?>
        </div>
      </div><!-- 侧栏 end -->
    <?php endif?>
 </div>
<p class="text-center" id="nav-below"><?php _e('自动加载完成，这是底线','rujuedesign')?> <span id="older_posts"><?php next_posts_link(__('NextPage')) ?></span></p>
<?php page_list();//分页?>

<?php get_footer();?>