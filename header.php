<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php _echo_CDN_URL('bootstrap.min.css','css')?>">
<link rel="stylesheet" href="<?php bloginfo('template_url')?>/style.css?v=1.13">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>

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
<script src="<?php _echo_CDN_URL('jquery.min.js')?>" type="text/javascript"></script>
<script src="<?php _echo_CDN_URL('jquery.sidr.min.js')?>" type="text/javascript"></script><!-- 导肮栏JS -->
<?php wp_body_open();//钩子?>