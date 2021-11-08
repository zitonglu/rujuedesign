<?php
/**
 * CDN提交的内容转换为对应的数组，对应文件名
 *
 * @since 2020-10-8
 * @version 1.0
 * @package functions.php
 * @author xiexudong@rujue.cn
 * @copyright www.rujue.cn
 * @param  textarea
 * @return $Array
 */
function _CDNUrlTOArray($textarea){
	$arr = explode("\r\n",$textarea);
	foreach ($arr as $key) {
		$arrs = explode('/',$key);
		$filename = $arrs[count($arrs)-1];
		if (empty($filename)) {
			$returnArr[] = $key;
		}else{
			$returnArr[$filename] = $key;
		}
	}
	return $returnArr;
}

/**
 * CDN加速直接输出返回CDN的URL地址
 *
 * @since 2020-10-8
 * @version 2.0
 * @package functions.php
 * @author xiexudong@rujue.cn
 * @copyright www.rujue.cn
 * @param  $name,$type
 * @return URL 字符串
 */
function _echo_CDN_URL($name,$type='js'){
	$arr = _CDNUrlTOArray(get_option('CDN_array_url'));
	if (array_key_exists($name,$arr)) {
		echo $arr[$name];
	}else{
		$blog_url = get_bloginfo('template_url').'/'.$type.'/'.$name;
		echo $blog_url;
	}
}
?>