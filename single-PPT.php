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
<link rel="stylesheet" href="<?php _echo_CDN_URL('bootstrap.min.css','css')?>">
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
            <p><small><?php 
            $rujuedesign_author_value = get_post_meta($post->ID,'_rujuedesign_author',true);
            $rujuedesign_URL_value = get_post_meta($post->ID,'_rujuedesign_URL',true);
            if($rujuedesign_URL_value){echo $rujuedesign_URL_value.' ';}
            if($rujuedesign_author_value){echo $rujuedesign_author_value;}else{the_author_nickname();}
            _e(' - 发布于','rujuedesin');
             ?> <time><?php the_time();?></time></small></p>
          </section><!-- page 1 -->
      <?php the_content();}} ?>
    </div><!-- end slides -->
  </div><!-- end reveal -->
  <!-- <script src="https://cdn.bootcdn.net/ajax/libs/reveal.js/4.1.2/reveal.js"></script> -->
  <script src="<?php _echo_CDN_URL('reveal.js')?>"></script>
  <script>
    Reveal.initialize({
        controls:true,
        progress:true,
        center:false,
        transition:'concave',
        transitionSpeed:'slow',
        slideNumber:'c/t'
    });
    window.onload=function(){
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