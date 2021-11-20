<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="<?php echo bloginfo('name');?>">
<?php wp_head(); ?>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="<?php _echo_CDN_URL('reset.css','css')?>">
<link rel="stylesheet" href="<?php _echo_CDN_URL('reveal.css','css')?>">
<link rel="stylesheet" href="<?php _echo_CDN_URL('reveal-sky.css','css')?>" id="theme">
<?php echo get_option('rujuedesign_top_JQ');?>

<title><?php single_post_title(); ?></title>
</head>
<body <?php body_class();?>><?php wp_body_open();//钩子?>
  <div class="reveal">
    <div class="slides">
      <?php if (have_posts()){
        while(have_posts()){
          the_post();
          ?>
          <section class="title">
            <h1><strong><?php single_post_title(); ?></strong></h1>
            <p>
              <small>
                <?php echo get_the_tag_list('',' | ',' ');?> - <time><?php the_time();?></time>
                <br><br><small><?php 
                _e('键盘 &#8592 &#8594 键翻页浏览，支持演讲笔翻页','rujuedesign');
                  $PPTID = get_option('PPT_page');
                  if ($PPTID) {
                    echo ' <a href="' . get_page_link($PPTID) . '" target="_blank">>></a>';
                  }
                ?>
              </small>
              </small>
            </p>
          </section><!-- page 1 -->
          <section><?php the_content();?></section>
          <section>
            <h2><?php _e('谢谢聆听','rujuedesin');?></h2>
            <div class="wp-block-media-text mt-4">
              <figure class="wp-block-media-text__media">
                <a href="<?php echo home_url();?>"><img src="<?php bloginfo('template_url')?>/img/qrcode.jpg" alt="weixin"></a>
              </figure>
              <div class="wp-block-media-text__content">
                <p class="has-large-font-size"><?php _e('全案内容请关注微信公众号输入文章ID','rujuedesin');echo ':'.$post->ID;?></p>
                <ul class="ls-none">
                  <li><?php echo previous_post_link('%link','&#9650 %title')?></li>
                  <li><?php echo next_post_link('%link','&#9660 %title')?></LI>
                </ul>
              </div>
            </div>
            <p class="mt-3"><small><?php _e('更多','rujuedesign')?><?php echo get_the_tag_list(' ',' , ',' ');?><?php _e('相关内容请点击浏览','rujuedesign')?>：<a href="<?php echo home_url();?>" class="endName" target="_blank"><img src="<?php bloginfo('template_url'); ?>/favicon.ico" alt="<?php _e('海安儒爵软件开发工作室','rujuedesign')?>"> <?php bloginfo('name');?></a></small></p>
            <footer class="footer">2021-2022 <a href="//www.rujue.cn" title="<?php _e('海安儒爵软件开发工作室','rujuedesign')?>"><?php _e('海安儒爵软件开发工作室','rujuedesign')?></a> -    
    <a href="//beian.miit.gov.cn/" rel="nofollow"><?php echo get_option( 'get_ICP' );?></a> Powered By <a href="//cn.wordpress.org" rel="nofollow">WordPress</a>. Theme by <a href="//www.rujue.cn" title="<?php _e('海安儒爵软件开发工作室','rujuedesign')?>">RuJue.cn</a>
            </footer>
          </section><!-- page end -->
          <?php 
          $metaNumber = get_post_meta($post->ID,'T',true);
          $transitionArray = ['none','fade','slide','convex','concave','zoom'];
          $transitionArraynumber = ['0','1','2','3','4','5'];
          if (in_array($metaNumber,$transitionArraynumber)) {
            $tran = $transitionArray[$metaNumber];
          }else{
            $tran = $transitionArray[0];
          }// end tran
        }} ?>
    </div><!-- end slides -->
  </div><!-- end reveal -->
  <!-- <script src="https://cdn.bootcdn.net/ajax/libs/reveal.js/4.1.2/reveal.js"></script> -->
  <script src="<?php _echo_CDN_URL('reveal.js')?>"></script>
  <script>
    Reveal.initialize({
        controls:true,
        progress:true,
        center:false,
        transition:'<?php echo $tran;?>',
        transitionSpeed:'default',// default-中速/fast-快速/slow-慢速
        viewDistance: 3,
        slideNumber:'c/t'
    });
    window.onload=function(){// 给所有的链接增加一个新窗户
    var tags = document.getElementsByTagName("a");
      for(var i=0; i<tags.length; i++){
        var a = tags[i];
        a.target="_blank";
      }
    }
  </script>
  <?php wp_footer(); ?>
  <?php echo get_option('rujuedesign_bottom_JQ');?>
</body>
</html>