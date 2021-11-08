<?php
/**
 * 给每个RSSfeed里面增加最新文章列表和版权说明
 *
 * @since //www.wpdaxue.com/how-to-add-custom-content-to-wordpress-feed.html
 * @version 1.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 * @param  $content
 * @return $conten.$copyright.$after
 */
function rujuedesign_add_content_feed_newList($content) {
	$copyright = '<p>';
	$copyright .= __('源文标题','rujuedesign').':<a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a>，';
	$copyright .= __('文章来自','rujuedesign').':<a rel="bookmark" title="'.get_the_title().'" href="'.get_permalink().'">'.get_permalink().'</a>，';
	$copyright.= __('特别声明：除特别标注，本站文章均为原创，遵循','rujuedesign').'<a href="http://creativecommons.org/licenses/by-nc/3.0/deed.zh_HK" target="_blank">CC BY-NC 3.0</a>'.__('，转载请注明出处','rujuedesign');
	$copyright .= '</p>';
    $after = '<h3>'.__('最新文章','rujuedesign').'</h3><ul>';
    $recent_posts = wp_get_recent_posts(6);
    foreach( $recent_posts as $recent ){
        $after .= '<li><a target="_blank" href="'.get_permalink($recent["ID"]).'">'.$recent["post_title"].'</a></li>';
    }

    $after .= '</ul>';
    return $content . $copyright . $after;
}
add_filter('the_content_feed', 'rujuedesign_add_content_feed_newList');
?>