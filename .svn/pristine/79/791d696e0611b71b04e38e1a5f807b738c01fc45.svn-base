<?php require_once "application/config/My_constants.php";?>
<script type="text/javascript">
//FancyBox Document
jQuery(document).ready(function() {
	jQuery("a#example6").fancybox({
		'titlePosition'		: 'outside',
		'overlayColor'		: '#000',
		'overlayOpacity'	: 0.9
	});
	
//sudo slider Document
jQuery(document).ready(function($){	
     var sudoSlider = jQuery("#testimonail").sudoSlider({
        continuous:true,
        numeric:false
     });
 });
});
function go_blog(id){
	$("#blog_id").val(id);
	$('#f_form').attr('action','<?php echo ADR_BLOG_PAGE_URL; ?>');
	$('#f_form').submit();
}
</script>
<div class="clear"></div>
<form id="f_form" method="post">
<input type="hidden" name="blog_id" id="blog_id"/>
</form>
<!-- Flex Slider Start -->
<div class="flexslider">
    <ul class="slides">
        <li>
            <div class="slider_content">
                <div class="thumb_img"> <img src="./images/slider_img_1.png" alt="img" /> </div>
                <div class="description">
                    <h1>MAKE IDEA'S</h1>
                    <div class="slide_caption">Etiam <span>porttitor</span> dapibus turpis a <span>congue</span>.</div>
                    <p>Duis dignissim blandit varius curabitur adipiscing ornare luctus.</p>
            	</div>
            </div>
        </li>
        <li> 
            <div class="slider_content">
                <div class="thumb_img"> <img src="./images/slider_img_2.png" alt="img" /> </div>
                <div class="description">
                    <h1>24/7 SUPPORT</h1>
                    <div class="slide_caption">Accumsan non <span>laoreet in molestie</span> vitae sapien.</div>
                    <p>Vestibulum enenatis sagittis turpis eu varius enim vulputate pretium.</p>
                </div>
            </div>
        </li>
        <li>
            <div class="slider_content">
                <div class="thumb_img"> <img src="./images/slider_img_3.png" alt="img" /> </div>
                <div class="description">
                    <h1>BEST ADVICE</h1>
                    <div class="slide_caption">Fusce lobortis <span>egestas</span> risus tincidunt</div>
                    <p>Nulla feugiat feugiat massa a lobortis metus imperdiet semper.</p>
                </div>
            </div>
        </li>
    </ul>
</div>
<!-- Flex Slider End -->

<!-- Teaser Start -->
<div class="teaser">

<div class="teaser_content">
	<h3>大家好！我们是<strong>yoara&ciara</strong>。
	叫我们yc就好啦~这里是我们自己的小窝，打算做些设计插图、小四格、小应用。。。虽然现在<strong>什么都没有啦~~</strong>
	总之，<strong>努力加油</strong>吧~</h3>

</div>
<div class="teaser_button">
	<a href="<?php echo ADR_ABOUTUS_URL;?>" class="button">了解更多</a>
</div>

</div>
<!-- Teaser End -->

<!-- Content Start -->
<section id="content">

<div class="teaser_container clearfix">
<?php foreach ($hot_infos as $key => $value){?>
<div class="<?php echo $key==2?"one_third_last":"one_third"?>">
    <div class="teaser_box">
        <h3><a href="<?php echo ADR_BLOG_PAGE_URL.'/'.$value['blog_id'];?>"><?php echo $value['title'];?></a></h3>
        <p><?php echo $value['short_content'];?></p><br />
        <a href="javascript:go_blog('<?php echo $value['blog_id'];?>')" class="button">更多..</a>
    </div>
</div>
<?php }?>
</div>

<div class="v_space clear"></div>

<div class="title_holder">
    <h3><span>最近留言</span></h3>
</div>

<div id="testimonail_wrapper">
<div id="testimonail">
<ul>
	<?php foreach ($message_info as $value) {?>
    <li>
        <p><?php echo $value['message_content'];?></p>
        <span>姓名：<?php echo $value['message_name'];?></span>
    </li>
    <?php }?>
</ul>
</div>
</div>

<div class="v_space"></div>

<div class="title_holder">
    <h3><span>最近作品</span></h3>
</div>

<div class="demo">
<ul id="list" class="image-grid_3col">
	<?php foreach ($product_latest_info as $value) {?>
    <li>
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

<!-- Content End -->
