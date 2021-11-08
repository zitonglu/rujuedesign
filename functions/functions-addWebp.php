<?php
/**
 * 让主题增加识别webp格式图片
 *
 * @since //blog.csdn.net/sunboy_2050/article/details/103722422
 * @version 1.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 */
//添加可以上传
function _add_webp( $array ) {
    $array['webp'] = 'image/webp';
    return $array;
}
add_filter('mime_types','_add_webp',10,1);
//添加媒体识别
function _add_image_webp($result, $path) {
    $info = @getimagesize($path);
    if($info['mime'] == 'image/webp') {
        $result = true;
    }
    return $result;
}
add_filter('file_is_displayable_image','_add_image_webp',10,2);
?>