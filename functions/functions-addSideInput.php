<?php
/**
 * 增加文章侧栏自定义字段
 *
 * @since //www.boke8.net/wordpress-post-type-meta-box.html
 * @version 2.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 */
//添加设置区域的函数
function limiwuwp_add_source_box(){
    add_meta_box('downURL',__('资源下载','limiwuwp'),'limiwuwp_add_source','post','side');
};

add_action('add_meta_boxes','limiwuwp_add_source_box');//挂上
//显示设置区域的回调函数
function limiwuwp_add_source($post,$boxargs){
    // 创建临时隐藏表单，为了安全
    wp_nonce_field('limiwuwp_add_source','limiwuwp_add_source_nonce');
    // 获取之前存储的值
    $limiwuwp_downURL_value = get_post_meta($post->ID,'_limiwuwp_downURL',true);
    $limiwuwp_downPass_value = get_post_meta($post->ID,'_limiwuwp_downPass',true);
    $limiwuwp_URL_value = get_post_meta($post->ID,'_limiwuwp_URL',true);
    $limiwuwp_author_value = get_post_meta($post->ID,'_limiwuwp_author',true);
?>
    <label for="limiwuwp_downURL"><?php _e('下载网址','limiwuwp');?>:</label>
    <input style="width: 100%" type="url" id="limiwuwp_downURL" name="limiwuwp_downURL" value="<?php echo esc_attr($limiwuwp_downURL_value); ?>" placeholder="<?php _e('输入网址，含http','limiwuwp');?>">
    <label for="limiwuwp_downPass"><?php _e('下载密码','limiwuwp');?>:</label>
    <input style="width: 100%" type="text" id="limiwuwp_downPass" name="limiwuwp_downPass" value="<?php echo esc_attr($limiwuwp_downPass_value); ?>" placeholder="<?php _e('下载密码，如果有的话','limiwuwp');?>">
    <label for="limiwuwp_URL"><?php _e('来源网站','limiwuwp');?>:</label>
    <input style="width: 100%" type="url" id="limiwuwp_URL" name="limiwuwp_URL" value="<?php echo esc_attr($limiwuwp_URL_value); ?>" placeholder="<?php _e('输入网址，含http','limiwuwp');?>">
    <label for="limiwuwp_author"><?php _e('文章作者','limiwuwp');?>:</label>
    <input style="width: 100%" type="text" id="limiwuwp_author" name="limiwuwp_author" value="<?php echo esc_attr($limiwuwp_author_value); ?>" placeholder="<?php _e('文章作者','limiwuwp');?>">
<?php
}
add_action('save_post','limiwuwp_add_source_save_meta_box');//验证保存内容

function limiwuwp_add_source_save_meta_box($post_id){
    // 安全检查
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if(!isset($_POST['limiwuwp_add_source_nonce'])){return;}
    // 判断隐藏表单的值与之前是否相同
    if(!wp_verify_nonce($_POST['limiwuwp_add_source_nonce'],'limiwuwp_add_source')){return;}
    // 判断该用户是否有权限
    if(!current_user_can('edit_post',$post_id)){return;}
    // 判断 Meta Box 是否为空
    if(!isset($_POST['limiwuwp_downURL'])){return;}
 
    $limiwuwp_downURL_value = sanitize_text_field($_POST['limiwuwp_downURL']);
    update_post_meta($post_id,'_limiwuwp_downURL',$limiwuwp_downURL_value);
    $limiwuwp_downPass_value = sanitize_text_field($_POST['limiwuwp_downPass']);
    update_post_meta($post_id,'_limiwuwp_downPass',$limiwuwp_downPass_value);
    $limiwuwp_URL_value = sanitize_text_field($_POST['limiwuwp_URL']);
    update_post_meta($post_id,'_limiwuwp_URL',$limiwuwp_URL_value);
    $limiwuwp_author_value = sanitize_text_field($_POST['limiwuwp_author']);
    update_post_meta($post_id,'_limiwuwp_author',$limiwuwp_author_value);
}
?>