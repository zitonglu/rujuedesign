<?php
/**
 * 自动推送给百度API
 *
 * @since //www.mybj123.com/1853.html
 * @version 1.0
 * @package functions.php
 */
function Baidu_XZH_Submit($post_ID) {
    //已成功推送的文章不再推送
	if(empty(get_post_meta($post_ID,'BaiduAPI',true))){
		$url = get_permalink($post_ID);
		$api = 'http://data.zz.baidu.com/urls?site='.home_url().'&token='.get_option('baidu_api');
		$request = new WP_Http;
		$result = $request->request( $api , array( 'method' => 'POST', 'body' => $url , 'headers' => 'Content-Type: text/plain') );
		$result = json_decode($result['body'],true);
	    //如果推送成功则在文章新增自定义栏目BaiduAPI
		if (array_key_exists('success',$result)) {
			add_post_meta($post_ID, 'BaiduAPI', date('Y-m-d H:i:s',time()), true);	
		}
	}
}
add_action('publish_post', 'Baidu_XZH_Submit', 0);
?>