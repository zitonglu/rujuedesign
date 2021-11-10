<?php
/**
 * 儒爵设计主题基础函数
 *
 * @since 2021-11-8
 * @version 1.0
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.com.cn
 */
// 去除WordPress相关鸡肋
require_once get_parent_theme_file_path('/functions/functions-clearWP.php');
// 给每个RSSfeed里面增加最新文章列表和版权说明
require_once get_parent_theme_file_path('/functions/functions-addFeedText.php');
// 修改时间的显示格式为XXX秒、分钟、小时、天前
require_once get_parent_theme_file_path('/functions/functions-pastDate.php');
// 让主题增加识别webp格式图片
require_once get_parent_theme_file_path('/functions/functions-addWebp.php');
// 增加备案号到常规字段里
require_once get_parent_theme_file_path('/functions/functions-addICP.php');
// CDN加速直接输出返回CDN的URL地址
require_once get_parent_theme_file_path('/functions/functions-CDN.php');
// 网站主题相关设置函数
require_once get_parent_theme_file_path('/functions/functions-option.php');
// 增加文章侧栏自定义字段
require_once get_parent_theme_file_path('/functions/functions-addSideInput.php');

//开启缩略图
if(function_exists('add_theme_support')){add_theme_support('post-thumbnails');};

// 开启文章相关形式
add_theme_support('post-formats',array('image'));

// 开启主题的小工具
if( function_exists('register_sidebar')){
    register_nav_menus( array(
    'primary' => __('顶部导航','rujuebook'),
    'tool' => __('小工具','rujuebook'),
    ));
}

// 侧栏小工具
if( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'right-sider',
        'description'   => __('放置在文章页面的右侧','rujuebook'),
        'class' => 'right-sider',
        'before_widget' => '<aside class="widget pb-3 mb-4 %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}

?>