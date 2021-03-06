<?php 
/**
 * 网站SEO优化代码
 *
 * @author 910109610@qq.com
 * @since 2020-7-5
 */
$description = '';
$keywords = '';
if (is_home() || is_page()) {
    $description = get_option('limiwuwp_homeDescription');
    $keywords = get_option('limiwuwp_homeKeyword');
}
elseif (is_single()) {
   $description1 = get_post_meta($post->ID, "description", true);
   $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
   $description = $description1 ? $description1 : $description2;
   $keywords = get_post_meta($post->ID, "keywords", true);
   if($keywords == '') {
      $tags = wp_get_post_tags($post->ID);
      foreach ($tags as $tag ) {
         $keywords = $keywords . $tag->name . ", ";
      }
      $keywords = rtrim($keywords, ', ');
   }
}
elseif (is_category()) {
   $description = category_description();
   $keywords = single_cat_title('', false);
}
elseif (is_tag()){
   $description = tag_description();
   $keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="description" content="<?php echo $description; ?>" />

<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- 启用 WebApp 全屏模式 -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /><!-- 隐藏状态栏/设置状态栏颜色 -->
<meta content="telephone=no" name="format-detection" /><!-- 忽略数字自动识别为电话号码 -->
<meta content="email=no" name="format-detection" /><!-- 忽略识别邮箱 -->
<!-- seo end -->