<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php _echo_CDN_URL('bootstrap.min.css','css')?>">
<link rel="stylesheet" href="<?php bloginfo('template_url')?>/style.css?v=0.1111">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>
<!-- https://icons.bootcss.com/图标，暂时用不到
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css"> -->
<?php echo get_option('rujuedesign_top_JQ');?>

<!--[if lt IE 9]>
  <script src="//apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="//apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<title><?php if ( is_home() ) {
        bloginfo('name'); echo " | "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " | "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_tag() ) {
        wp_title( '|', true, 'right' );
        echo preg_replace('/<\/?[^>]+>/i','',tag_description());
    } elseif (is_search() ) {
        echo "search result:"; echo " | "; bloginfo('name');
    } elseif (is_404() ) {
        echo '404 | '.__('您所浏览的页面错误','rujuedesign');
    } else {
		wp_title(); 
}?></title>

<?php get_template_part('other/seo');//SEO ?>

</head>

<body <?php body_class();?>>
<?php wp_body_open();//钩子?>
<script src="<?php _echo_CDN_URL('jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php _echo_CDN_URL('jquery.sidr.min.js')?>" type="text/javascript"></script><!-- 导肮栏JS -->

<div class="container-fluid">
    <a id="right-menu" href="#right-menut" class="float-right">&#8644</a>
    
    <nav class="mt-2">
        <a id="left-menu" href="#left-menu" class="mr-2">
            <img src="<?php bloginfo('template_url'); ?>/favicon.ico" alt="ico" width="auto" height="20px" class="mr-1 pb-1"><?php bloginfo('name');?>
        </a>
        <?php if(!wp_is_mobile()):?>
            <small class="text-muted"> - <?php bloginfo('description');?> - </small><!-- 副标题 -->
        <?php endif?>
    </nav><!-- 导航end -->
    <div id="sidr-left">
        <?php  if (has_nav_menu('primary')){
               wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'depth' => 2,
                ));
            }
        ?>
    </div>
    <div id="sidr-right">
        <?php  if (has_nav_menu('primary')){
               wp_nav_menu(array(
                'theme_location' => 'tool',
                'container' => false,
                'depth' => 2,
                ));
            }
        ?>
    </div>
