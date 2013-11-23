<?php require_once "application/config/My_constants.php";?>
<script type="text/javascript">
$(document).ready(function() {
	$("a#example6").fancybox({
		'titlePosition'		: 'outside',
		'overlayColor'		: '#000',
		'overlayOpacity'	: 0.9
	});
});
</script>
<section id="content">

<div class="demo">
<ul id="list" class="image-grid_3col">

	<?php foreach ($pictureInfo as $value) {?>
    <li data-id="id-<?php echo $value['ID'];?>" class="photo">
        <div class="portfolio_content">
        <img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" alt="img" />
        <h4><?php echo $value['PICTURE_NAME'];?></h4>
        <div class="link_btn">
            <a id="example6" href="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" class="zoom"></a>
            <a href="<?php echo ADR_PRODUCT_PICTURE_VIEW_URL.'/'.$value['ID'];?>" class="link_post"></a>
            <div class="overlay"></div>
        </div>
        </div>
    </li>
    <?php }?>
</ul>
</div>

</section>
<!--Content End -->
