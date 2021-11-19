<?php/** * 主题相关参数设置 * * @since 2020-8-30 * @version 1.0830 * @package functions.php * @author zitonglu/910109610@qq.com * @copyright rujue.cn */function rujuedesign_ad_theme_setting(){  if($_POST['rujuedesign_update_themeoptions']=='true') {rujuedesign_themeoptions_update();}  add_theme_page(__('网站设置','rujuedesign'),__('网站设置','rujuedesign'),'administrator','theme_setting','rujuedesign_theme_setting'); }   add_action('admin_menu','rujuedesign_ad_theme_setting');//设置关键词function rujuedesign_themeoptions_update(){  update_option('rujuedesign_homeKeyword',$_POST['homeKeyword']);  update_option('rujuedesign_top_JQ',stripslashes($_POST['top_JQ']));  update_option('rujuedesign_bottom_JQ',stripslashes($_POST['bottom_JQ']));  update_option('CDN_array_url',$_POST['CDN_array_url']);  update_option('baidu_api',$_POST['baidu_api']);  update_option('SM_MIP_user_name',$_POST['SM_MIP_user_name']);  update_option('SM_MIP_Authkey',$_POST['SM_MIP_Authkey']);  update_option('PPT_page',$_POST['PPT_page']);}function rujuedesign_theme_setting(){ ?><div class="wrap">  <h1><?php _e('网站设置','rujuedesign')?></h1>  <hr>  <form method="POST" action="" style="padding-left:20px;">  <input type="hidden" name="rujuedesign_update_themeoptions" value="true" /><!-- hidden -->  <table class="form-table" role="presentation">    <tbody>      <tr>        <th scope="row"><label for="homeKeyword"><?php _e('首页关键词','rujuedesign')?></label></th>        <td>          <input name="homeKeyword" type="text" id="homeKeyword" value="<?php echo get_option('rujuedesign_homeKeyword'); ?>" class="regular-text">          <p class="description"><?php _e('多个词请使用英文半角逗号隔开','rujuedesign')?></p>        </td>      </tr><!-- 首页关键词 end -->      <tr>        <th scope="row"><label for="top_JQ"><?php _e('顶部JS/JQ','rujuedesign')?></label></th>        <td>          <textarea name="top_JQ" cols="60" rows="4"><?php echo get_option('rujuedesign_top_JQ'); ?></textarea>          <p class="description"><?php _e('网站顶部的JS/JQ代码','rujuedesign')?></p>        </td>      </tr><!-- 顶部JS/JQ end -->      <tr>        <th scope="row"><label for="bottom_JQ"><?php _e('底部JS/JQ','rujuedesign')?></label></th>        <td>          <textarea name="bottom_JQ" cols="60" rows="4"><?php echo get_option('rujuedesign_bottom_JQ'); ?></textarea>          <p class="description"><?php _e('网站底部的JS/JQ代码','rujuedesign')?></p>        </td>      </tr><!-- 底部JS/JQ end -->      <tr>        <th scope="row"><label for="CDN_array_url">CDN<?php _e('加速网址','rujuedesign')?></label></th>        <td>          <textarea name="CDN_array_url" cols="100" rows="10"><?php echo get_option('CDN_array_url'); ?></textarea>          <p class="description"><?php _e('输入需要加速的JS后者css文件，一行一个加速网址，相应位置插入类似代码','rujuedesign')?>:</p>          <p><code>&lt;?php _echo_CDN_URL('bootstrap.min.js')?&gt;<br>&lt;?php _echo_CDN_URL('bootstrap.min.css','css')?&gt;</code></p>        </td>      </tr><!-- CDN加速网址 end -->      <tr>        <th scope="row"><label for="PPT_page"><b>PPT操作说明</b>:</label></th>        <td>          <input name="PPT_page" type="number" id="PPT_page" value="<?php echo get_option('PPT_page'); ?>" class="regular-text">          <p class="description"><?php _e('文章ID','rujuedesign')?></p>        </td>      </tr><!-- PPT_page end -->      <tr>        <th scope="row"><label for="baidu_api"><b>SEO-Baidu-API</b>:</label></th>        <td>          <input name="baidu_api" type="text" id="baidu_api" value="<?php echo get_option('baidu_api'); ?>" class="regular-text">          <p class="description"><?php _e('百度API的收录推广','rujuedesign')?></p>        </td>      </tr><!-- SEO baidu_API end -->      <tr>        <th scope="row"><label for="SM_MIP_user_name"><b>SEO-SM-userName</b>:</label></th>        <td>          <input name="SM_MIP_user_name" type="text" id="SM_MIP_user_name" value="<?php echo get_option('SM_MIP_user_name'); ?>" class="regular-text">          <p class="description"><?php _e('神马搜索用户名','rujuedesign')?></p>        </td>      </tr><!-- SEO SM_MIP_userName end -->      <tr>        <th scope="row"><label for="SM_MIP_Authkey"><b>SEO-SM-Authkey</b>:</label></th>        <td>          <input name="SM_MIP_Authkey" type="text" id="SM_MIP_Authkey" value="<?php echo get_option('SM_MIP_Authkey'); ?>" class="regular-text">          <p class="description"><?php _e('神马搜索','rujuedesign')?>Authkey</p>        </td>      </tr><!-- SEO SM_MIP_Authkey end -->    </tbody>  </table>    <p><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('提交修改','rujuedesign') ?>">    </p>  </form></div><?php }?>