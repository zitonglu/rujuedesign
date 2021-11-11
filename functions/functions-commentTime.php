<?php
/**
 * 控制两次评论的间隔
 *
 * @since //www.zhutihome.net/6997.html  //blog.csdn.net/andy_5826_liu/article/details/84528174
 * @version 1.0
 * @package functions.php
 * @copyright rujue.cn
 */

function comment_time_length($flood_control,$time_last,$time_new){
    $seconds=1;
    if(($time_new-$time_last)<$seconds){
        return true;
    }else{
        return false;
    }
}
add_filter('comment_flood_filter','comment_time_length',10,3);

/* 评论必须有中文 */  
function refused_spam_comments($comment_data ){  
	$pattern = '/[一-龥]/u';  
	if(!preg_match($pattern,$comment_data['comment_content'])){
		err('评论必须含中文！');  
	}  
	return( $comment_data );  
}  
add_filter('preprocess_comment','refused_spam_comments');

// 移除网址表单
function url_filtered($fields) {
    if(isset($fields['url']))
        unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'url_filtered');
 
// 移除邮箱地址
add_filter('comment_form_defaults','remove_email');
function remove_email($comment_form_html_arr){
    //删除email文本框
    unset($comment_form_html_arr['fields']['email']);
    //修改评论提醒内容，去掉电子邮件相关的提醒。
    $comment_form_html_arr['comment_notes_before'] = '<p class="comment-notes">'.sprintf( ' ' . __( 'Required fields are marked %s' ), '<span class="required">*</span>' ).'</p>';
    return $comment_form_html_arr;
}

// 移除评论人名字的链接
function disable_comment_author_links( $author_link ) {
    return strip_tags( $author_link );
}
add_filter( 'get_comment_author_link', 'disable_comment_author_links' );
?>