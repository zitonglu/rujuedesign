<?php
/**
 * 增加备案号到常规字段里
 *
 * @since //www.wpdaxue.com/add-field-to-general-settings-page.html
 * @version 1.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 */
$new_general_setting = new new_general_setting();
class new_general_setting{
    function new_general_setting(){
        add_filter('admin_init',array(&$this,'register_fields'));
    }
    function register_fields(){
        register_setting('general','get_ICP','esc_attr');
        add_settings_field('ICP','<label for="get_ICP">'.__('备案号','limiwuwp').'</label>',array(&$this,'fields_html'),'general');
    }
    function fields_html(){
        $value = get_option('get_ICP','');
        echo'<input type="text" id="get_ICP" name="get_ICP" value="'.$value.'" />';
    }
}
?>