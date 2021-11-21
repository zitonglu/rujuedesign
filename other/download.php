<?php //下载页面

$rujuedesign_downURL_value = get_post_meta($post->ID,'_rujuedesign_downURL',true);
$rujuedesign_downPass_value = get_post_meta($post->ID,'_rujuedesign_downPass',true);
if($rujuedesign_downURL_value):?>
<a data-toggle="collapse" href="#download" aria-expanded="false" aria-controls="download"><?php _e('下载地址','rujuedesign');?></a>
<div class="collapse media mt-3 text-dark" id="download">
  <?php if (is_user_logged_in()):?>
    <img src="<?php bloginfo('template_url')?>/img/qrcode.jpg" class="mr-3" alt="weixin" width="100px">
    <div class="media-body">
      <h3><?php _e('关注微信号','rujuedesign')?></h3>
        <p>
          <?php _e('下载地址：','rujuedesign');?><a href="<?php echo $rujuedesign_downURL_value;?>" target="_blank" rel="nofollow"><?php echo $rujuedesign_downURL_value;?></a>
          <?php 
          if($rujuedesign_downPass_value){
            $now_time = time();
            $post_time = get_post_time('U', true);
            $past_time = $now_time - $post_time; //文章发表至今经过多少秒
            $day = 86400;// 一天有86400秒
            $all_day = $day * 30;

            if (current_user_can('level_1') || $past_time >= $all_day ) {
              echo '<br>'.__('下载密码：','rujuedesign').$rujuedesign_downPass_value;
            }else{
              $need_day = floor(($all_day - $past_time)/$day);
              echo '<br>'.__('您的权限不足，还需等待<span class="badge badge-danger">'.$need_day.'</span>天，也可去微店购买"贡献者"权限','rujuedesign');
            }
          } ?>
        </p>
    </div>
  <?php else://user no in ?>
    <img src="<?php bloginfo('template_url')?>/img/weidian.png" class="mr-3" alt="weixin" width="100px">
    <div class="media-body">
      <h3><?php _e('扫码进入微店购买会员权限','rujuedesign')?></h3>
        <p>
          <strong>订阅者权限</strong>：可查看所有发文<strong> 30天 </strong>后的下载地址；<br>
          <strong>贡献者权限</strong> <span class="badge badge-danger">特价</span>：可查看所有素材下载地址，可发表文章(需审核)；
        </p>
    </div>
  <?php endif//user end ?>
</div>
<?php endif ?>