<?php require_once "application/config/My_constants.php";?>
<!-- Content Start -->
<section id="content" class="tag_line">

<div class="two_third">
	<div class="portfolio_flexslider">
    <ul class="slides">
    	<li><img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" alt="img" /></li>
    	<li><img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" alt="img" /></li>
    	<li><img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" alt="img" /></li>
    </ul>
    </div>
</div>

<div class="one_third_last">
    <h3><?php echo $value['PICTURE_NAME'];?></h3>
    <p><?php echo $value['MEMO'];?></p><br />
    <h4>作者</h4>
    <p><?php echo $value['AUDTOR'];?></p><br />
    <h4>上传时间</h4>
    <p><?php echo $value['PIC_DATE'];?></p>
</div>

</section>
