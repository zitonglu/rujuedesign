<?php //普通文章页面
get_header();?>
<?php if(!wp_is_mobile()):?>
<div class="right-sider float-right">
  <div class="theiaStickySidebar text-center">
    <p>关注微信号<br>
      <img src="<?php bloginfo('template_url')?>/img/qrcode.jpg" alt="weixin">
    </p>
    <a href="#left-menu">&uarr; 返回顶部</a>
  </div>
</div>
<?php endif?>
<div class="singlebox mt-3">
  <h1><?php single_post_title(); ?></h1>

  <?php if (have_posts()){
    while ( have_posts()){
      the_post();?>
      <div class="tool"><?php the_author_nickname();_e(' - 发布于','rujuedesin'); ?> <time><?php the_time();?></time></div>
  <?php the_content();}}?>
</div>
<?php get_footer();?>