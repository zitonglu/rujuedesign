<?php //下载页面
$rujuedesign_downURL_value = get_post_meta($post->ID,'_rujuedesign_downURL',true);
$rujuedesign_downPass_value = get_post_meta($post->ID,'_rujuedesign_downPass',true);
if($rujuedesign_downURL_value):?>
<a data-toggle="collapse" href="#download" aria-expanded="false" aria-controls="download"><?php _e('下载地址','rujuedesign');?></a>

<div class="collapse media mt-3" id="download">
  <img src="<?php bloginfo('template_url')?>/img/qrcode.jpg" class="mr-3" alt="weixin">
  <div class="media-body">
    <h3><?php _e('关注微信号','rujuedesign')?></h3>
      <p>
        <?php _e('下载地址：','rujuedesign');?><a href="<?php echo $rujuedesign_downURL_value;?>" target="_blank" rel="nofollow"><?php echo $rujuedesign_downURL_value;?></a>
        <?php if($rujuedesign_downPass_value){echo '<br>'.__('下载密码：','rujuedesign').$rujuedesign_downPass_value;} ?>
      </p>
  </div>
</div>
<?php endif?>