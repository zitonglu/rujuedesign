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
//控制两次评论的间隔,移除表单及邮箱地址、评论人链接等
require_once get_parent_theme_file_path('/functions/functions-commentTime.php');
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
// 增加文章侧栏自定义字段
require_once get_parent_theme_file_path('/functions/functions-addSideInput.php');

if ( is_user_logged_in()) {
  // 网站主题相关设置函数
  require_once get_parent_theme_file_path('/functions/functions-option.php');
  // 增加百度API推送
  if(get_option('baidu_api')){
      require_once get_parent_theme_file_path('/functions/functions-baidu-API.php');
  }
  // UC浏览器神马搜索MIP推送
  if(get_option('SM_MIP_user_name') && get_option('SM_MIP_Authkey')){
      require_once get_parent_theme_file_path('/functions/functions-SM-MIP.php');
  }
}
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
        'before_widget' => '<aside class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}
// 使用的是经典小工具栏
function example_theme_support() {
  remove_theme_support('widgets-block-editor');
}
add_action( 'after_setup_theme', 'example_theme_support' );

//分页函数
function page_list(){
    $posts_pagination = get_the_posts_pagination(
    array(
      'mid_size'  => 5,
      'prev_text' => '<',
      'next_text' => '>',
      'screen_reader_text'=>null,
      )
    );
    echo $posts_pagination;
}

//解析网址函数
function _parse_url($net,$n='host'){
    $returnUrl = parse_url($net);
    switch ($n){
        case 'scheme':
            return $returnUrl["scheme"];
            break;
        case 'path':
            return $returnUrl["path"];
            break;
        case 'query':
            return $returnUrl["query"];
            break;
        default:
            return $returnUrl["host"];
            break;
    }
}
?>