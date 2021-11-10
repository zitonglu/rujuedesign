<article id="post-<?php the_ID();?>" class="col-sm-6 col-md-4 col-xl-3 articlebox">
	<div class="article">
		<?php if(has_post_thumbnail()){ ?>
			<a href="<?php the_permalink();?>" target="_blank" id="thumbnail-<?php the_ID();?>">
			  <?php the_post_thumbnail('medium',array('class'=>'img-fluid mb-2','alt'=>get_the_title(),'title'=>get_the_excerpt()));?>
			</a>
			<a href="<?php the_permalink();?>" title="<?php the_title_attribute(); ?>" target="_blank" id="title-<?php the_ID();?>" class="list-title-name">	
				<?php the_title_attribute(); ?>
			</a>
			<p class="list-title-body">
				<?php 
				if(get_the_category()){//获取分类标签
				$cats = get_the_category();
				foreach ($cats as $cat) {
					echo '<a href="'.get_category_link($cat->term_id).'" title="'.$cat->description.'" traget="_blank" class="float-right list-title-cate">'.$cat->cat_name.'</a> ';
					}
				}
				?>
				<time><?php the_time();?></time>
			</p>
		<?php }else{?>
			<div class="media p-2 mb-3">
	        <div class="media-left mr-2">
	          <a href="#">
	            <img class="media-object" src="<?php bloginfo('template_url'); ?>/favicon.ico" alt="ico" height="36px">
	          </a>
	        </div>
	        <div class="media-body">
	          <a href="<?php the_permalink();?>"><h6><?php the_title_attribute(); ?></h6></a>
	          <small><?php the_excerpt();?></small>
	        </div>
	      </div>
		<?php }?>
	</div>
</article><!-- 文章<?php the_ID(); ?> End -->