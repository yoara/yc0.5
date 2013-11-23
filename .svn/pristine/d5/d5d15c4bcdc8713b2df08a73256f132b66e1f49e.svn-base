<script type="text/javascript">
$(document).ready(function() {
	$("a#example6").fancybox({
		'titlePosition'		: 'outside',
		'overlayColor'		: '#000',
		'overlayOpacity'	: 0.9
	});
});
</script>
<!-- Content Start -->
<section id="content">

<div class="portfolio_title_holder">
<span>
<ul class="splitter" id="filter">
    <li>
    <ul>
        <li class="segment-1 selected-1"><a href="#" data-value="all">全部</a></li>
        <li class="segment-0"><a href="#" data-value="scenery">作品</a></li>
        <li class="segment-2"><a href="#" data-value="photo">图片</a></li>
    </ul>
    </li>
</ul>
</span>
</div>

<div class="demo">
<ul id="list" class="image-grid">
	<?php foreach ($picture_info as $value) {?>
    <li data-id="id-<?php echo $value['ID'];?>" class="<?php echo $value['PRODUCT_ID']===NULL?"photo":"scenery";?>">
        <div class="portfolio_content">
            <img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" alt="img" />
            <h4><?php echo $value['PICTURE_NAME'];?></h4>
            <p><a ><?php echo $value['PRODUCT_ID']===NULL?"":$value['MEMO'];?></a></p>
            <div class="link_btn">
                <a id="example6" href="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" class="zoom"></a>
                <a href="<?php echo $value['PRODUCT_ID']===NULL?
                	ADR_PRODUCT_PICTURE_VIEW_URL.'/'.$value['ID']:
                	ADR_PRODUCT_PRODUCT_VIEW_URL.'/'.$value['PRODUCT_ID'];?>" class="link_post"></a>
                <div class="overlay"></div>
            </div>
        </div>
    </li>
    <?php }?>
</ul>
</div>

</section>
<!--Content End -->