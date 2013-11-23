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

<div class="demo">
<ul id="list" class="image-grid_2col">
	<?php foreach ($product_info as $value) {?>
    <li data-id="id-<?php echo $value['id'];?>" class="scenery">
        <div class="portfolio_content">
        <img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['show_pic'];?>" alt="img" />
        <h4><?php echo $value['product_name'];?></h4>
        <p><a ><?php echo $value['short_memo'];?></a></p>
        <div class="link_btn">
            <a id="example6" href="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['show_pic'];?>" class="zoom"></a>
            <a href="<?php echo ADR_PRODUCT_PRODUCT_VIEW_URL.'/'.$value['id'];?>" class="link_post"></a>
            <div class="overlay"></div>
        </div>
        </div>
    </li>
    <?php }?>
</ul>
</div>

</section>
<!-- Content End -->
