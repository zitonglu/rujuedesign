<?php
/**
 * 改变菜单nav相关属性
 *
 * @since 2020-8-25
 * @version 1.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 */
//变更nav导航栏的ul class 属性
function _nav_ul_css($var) {
	return array('nav-item');
}
add_filter('nav_menu_css_class','_nav_ul_css',100,1);
//变更nav导航栏的li class 属性
function _nav_li_css($atts,$item,$args){
  $atts['class'] = 'nav-link';
  return $atts;
}
add_filter('nav_menu_link_attributes','_nav_li_css',10,3);
//删除nav不需要的属性
function _del_nav_attr($var) {
	return is_array($var) ? array() : '';
}
add_filter('nav_menu_item_id','_del_nav_attr',100,1);
?>