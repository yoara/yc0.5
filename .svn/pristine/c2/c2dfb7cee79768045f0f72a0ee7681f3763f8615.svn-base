<?php require_once "application/config/My_constants.php";?>
<!-- Content Start -->
<section id="content" class="tag_line">

<div class="two_third">
	<div class="portfolio_flexslider">
    <ul class="slides">
    	<?php foreach ($value['pics'] as $pic_info) {?>
    		<li><img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$pic_info['URL'];?>" alt="img" /></li>
    	<?php }?>
    </ul>
    </div>
</div>

<div class="one_third_last">
    <h3><?php echo $value['product_name'];?></h3>
    <p><?php echo $value['memo'];?></p><br />
    <h4>作者</h4>
    <p><?php echo $value['audtor'];?></p><br />
    <h4>上传时间</h4>
    <p><?php echo $value['pro_date'];?></p><br />
    <h4><a href="<?php echo ADR_PRODUCT_PRODUCT_ROOT_URL.$value['url'];?>">下载地址</a></h4>
</div>

</section>
<!-- Content End -->
