<?php
/**
 * 自动推送给神马搜索引擎的MIP
 *
 * @since 2020-9-12
 * @version 1.0
 * @package functions.php
 * @author zitonglu/910109610@qq.com
 * @copyright rujue.cn
 */
function SM_MIP_Submit($post_ID) {
    //已成功推送的文章不再推送
	if(empty(get_post_meta($post_ID,'SM-MIP',true))){
		$url = get_permalink($post_ID);
		$api = 'https://data.zhanzhang.sm.cn/push?site='._parse_url(home_url()).'&user_name='.get_option('SM_MIP_user_name').'&resource_name=mip_add&token='.get_option('SM_MIP_Authkey');
		$request = new WP_Http;
		$result = $request->request( $api , array( 'method' => 'POST', 'body' => $url , 'headers' => 'Content-Type: text/plain') );
		$result = json_decode($result['body'],true);
	    //如果推送成功则在文章新增自定义栏目SM-MIP
		if ($result['returnCode']=='200') {
			add_post_meta($post_ID, 'SM-MIP', date('Y-m-d H:i:s',time()), true);	
		}
	}
}
add_action('publish_post', 'SM_MIP_Submit', 0);
?>