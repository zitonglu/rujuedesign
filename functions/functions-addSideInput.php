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
function rujuedesign_add_source_box(){
    add_meta_box('downURL',__('文章来源','rujuedesign'),'rujuedesign_add_source','post','side');
};

add_action('add_meta_boxes','rujuedesign_add_source_box');//挂上
//显示设置区域的回调函数
function rujuedesign_add_source($post,$boxargs){
    // 创建临时隐藏表单，为了安全
    wp_nonce_field('rujuedesign_add_source','rujuedesign_add_source_nonce');
    // 获取之前存储的值
    $rujuedesign_downURL_value = get_post_meta($post->ID,'_rujuedesign_downURL',true);
    $rujuedesign_downPass_value = get_post_meta($post->ID,'_rujuedesign_downPass',true);
    $rujuedesign_URL_value = get_post_meta($post->ID,'_rujuedesign_URL',true);
    $rujuedesign_author_value = get_post_meta($post->ID,'_rujuedesign_author',true);
?>
    <label for="rujuedesign_downURL"><?php _e('下载网址','rujuedesign');?>:</label>
    <input style="width: 100%" type="url" id="rujuedesign_downURL" name="rujuedesign_downURL" value="<?php echo esc_attr($rujuedesign_downURL_value); ?>" placeholder="<?php _e('输入网址，含http','rujuedesign');?>">
    <label for="rujuedesign_downPass"><?php _e('下载密码','rujuedesign');?>:</label>
    <input style="width: 100%" type="text" id="rujuedesign_downPass" name="rujuedesign_downPass" value="<?php echo esc_attr($rujuedesign_downPass_value); ?>" placeholder="<?php _e('下载密码，如果有的话','rujuedesign');?>">
    <label for="rujuedesign_URL"><?php _e('来源网站','rujuedesign');?>:</label>
    <input style="width: 100%" type="text" id="rujuedesign_URL" name="rujuedesign_URL" value="<?php echo esc_attr($rujuedesign_URL_value); ?>" placeholder="<?php _e('网站或公众号名称','rujuedesign');?>">
    <label for="rujuedesign_author"><?php _e('文章作者','rujuedesign');?>:</label>
    <input style="width: 100%" type="text" id="rujuedesign_author" name="rujuedesign_author" value="<?php echo esc_attr($rujuedesign_author_value); ?>" placeholder="<?php _e('文章作者','rujuedesign');?>">
<?php
}
add_action('save_post','rujuedesign_add_source_save_meta_box');//验证保存内容

function rujuedesign_add_source_save_meta_box($post_id){
    // 安全检查
    // 检查是否发送了一次性隐藏表单内容（判断是否为第三者模拟提交）
    if(!isset($_POST['rujuedesign_add_source_nonce'])){return;}
    // 判断隐藏表单的值与之前是否相同
    if(!wp_verify_nonce($_POST['rujuedesign_add_source_nonce'],'rujuedesign_add_source')){return;}
    // 判断该用户是否有权限
    if(!current_user_can('edit_post',$post_id)){return;}
    // 判断 Meta Box 是否为空
    if(!isset($_POST['rujuedesign_downURL'])){return;}
 
    $rujuedesign_downURL_value = sanitize_text_field($_POST['rujuedesign_downURL']);
    update_post_meta($post_id,'_rujuedesign_downURL',$rujuedesign_downURL_value);
    $rujuedesign_downPass_value = sanitize_text_field($_POST['rujuedesign_downPass']);
    update_post_meta($post_id,'_rujuedesign_downPass',$rujuedesign_downPass_value);
    $rujuedesign_URL_value = sanitize_text_field($_POST['rujuedesign_URL']);
    update_post_meta($post_id,'_rujuedesign_URL',$rujuedesign_URL_value);
    $rujuedesign_author_value = sanitize_text_field($_POST['rujuedesign_author']);
    update_post_meta($post_id,'_rujuedesign_author',$rujuedesign_author_value);
}
?>