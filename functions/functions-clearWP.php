<?php
/**
 * 去除WordPress相关鸡肋抬头
 *
 * @since 2020-8-25
 * @version 1.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 */
add_filter('rest_enabled','__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
remove_action('wp_head','wp_resource_hints',2);
remove_action('wp_head','rest_output_link_wp_head',10);
remove_action('wp_head','wp_oembed_add_discovery_links',10);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','wp_generator');
remove_action('admin_print_scripts','print_emoji_detection_script');
remove_action('admin_print_styles','print_emoji_styles');
remove_action('wp_head','print_emoji_detection_script',7);
remove_action('wp_print_styles','print_emoji_styles');
remove_filter('the_content_feed','wp_staticize_emoji');
remove_filter('comment_text_rss','wp_staticize_emoji');
remove_filter('wp_mail','wp_staticize_emoji_for_email');
//WordPress 5.0+移除 block-library CSS
function _remove_block_library_css(){wp_dequeue_style('wp-block-library');}
add_action('wp_enqueue_scripts','_remove_block_library_css',100);
?>