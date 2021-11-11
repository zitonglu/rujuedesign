<?php
if ( post_password_required())
	return;
?>

<?php if (comments_open()):?>
<!-- Comment Form -->
<div class="comment-post" id="respond">
<form id="commentform" name="commentform" action="<?php echo get_option('siteurl');?>/wp-comments-post.php" method="post" class="form-horizontal" role="form">
	<div class="form-group mb-1">
		<textarea name="comment" id="message comment" rows="3" tabindex="1" class="form-control" placeholder="<?php _e('发表您的评论','rujuedesign')?>(*)"></textarea>
	</div>
<?php if (!is_user_logged_in()):?>
	<div class="input-group mb-1">
		<div class="input-group-prepend">
	      <span class="input-group-text"><?php _e('称呼','rujuedesign')?></span>
	    </div>
		<input type="text" name="author" id="author" placeholder="Your Name(*)" value="<?php echo $comment_author;?>" tabindex="2" class="form-control">
	</div>
	<div class="input-group mb-1 d-none">
		<div class="input-group-prepend">
	      <span class="input-group-text"><?php _e('邮箱','rujuedesign')?></span>
	    </div>
		<input type="email" name="email" id="email" placeholder="Your E-mail" value="<?php echo $comment_author_email;?>" tabindex="3" class="form-control">
	</div>
	<div class="input-group mb-1 d-none">
		<div class="input-group-prepend">
	      <span class="input-group-text"><?php _e('网站','rujuedesign')?></span>
	    </div>
		<input type="text" name="url" id="url" placeholder="http(s)://" value="<?php echo $comment_author_url;?>" tabindex="4" class="form-control">
	</div>
<?php endif;?>
	<div class="form-group">
		<button type="submit" class="btn badge-warning border" name="sumbit" tabindex="7" onclick="Javascript:document.forms['commentform'].submit()"><?php _e('提交评论','rujuedesign')?></button>
		<?php if ( is_user_logged_in()):?>
		<a href="<?php echo wp_logout_url(get_permalink());?>" title="<?php _e('登出','rujuedesign')?>" class="btn btn-light border"><?php _e('登出','rujuedesign')?></a>
		<?php endif;?>
	</div>
	<?php comment_id_fields();?>
    <?php do_action('comment_form', $post->ID);?>
</form><!-- Comment Form End -->
</div><!-- #comments -->
<?php endif;?>

<?php if(have_comments()):?>
<!-- 评论内容 -->
<?php function limiwu_comment($comment, $args, $depth){ $GLOBALS['comment'] = $comment;?>
<ul class="list-unstyled mb-1" id="comment-<?php comment_ID();?>">
	<li><strong><?php echo get_comment_author()?></strong>：<?php echo get_comment_text();?><small class="ml-2"><time><?php echo get_comment_time();?></time> - <mark><?php comment_reply_link(array_merge($args, array('reply_text' => __('回复','rujuedesign'),'depth'=>$depth, 'max_depth' => $args['max_depth'])))?>&nbsp;<?php edit_comment_link(__('编辑','rujuedesign'));?></mark></small></li>

	<?php if ($comment->comment_approved == '0'):?>
		<li><button type="button" class="close" data-dismiss="alert">&times;</button><?php _e('审核中','rujuedesign')?></li>
		<?php endif?>
</ul>

<?php } wp_list_comments('type=comment&callback=limiwu_comment');//输出评论列表?>
<?php if(get_comment_pages_count()>1 && get_option('page_comments'))://评论翻页?>
	<div class="d-flex justify-content-between">
		<div><?php previous_comments_link( __( '← 上一页','rujuedesign'));?></div>
		<div><?php next_comments_link( __( '下一页 →','rujuedesign'));?></div>
	</div>
	<?php endif;?>
<?php endif; // have_comments()?>
