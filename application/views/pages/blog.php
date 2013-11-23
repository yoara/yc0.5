<?php require_once "application/config/My_constants.php";?>
<!-- Content Start -->
<script type="text/javascript">
function go_blog(id){
	$("#blog_id").val(id);
	$('#f_form').attr('action','<?php echo ADR_BLOG_PAGE_URL; ?>');
	$('#f_form').submit();
}
</script>
<form id="f_form" method="post">
<input type="hidden" name="blog_id" id="blog_id"/>
</form>
<section id="content" class="tag_line sidebar_right">
<div class="two_third">
<?php foreach ($blog_infos as $value) {?>
<div class="post_meta">
    <span class="post_date">
        <h5><?php echo date('d',strtotime($value['blog_date']));?><br />
        	<?php echo date('M',strtotime($value['blog_date']));?></h5>
    </span>
    <span class="post_comment">
        <h5><?php echo $value['reply_time'];?></h5>
    </span>
</div>
<div class="post_content">
    <h3><?php echo $value['title'];?></h3>
    <p><?php echo $value['short_content'];?></p><br />    
    <span class="blog_elements">
        <span class="post_by"><?php echo $value['audtor'];?></span>
        <span class="post_news"><?php echo $value['blog_date'];?></span>
        <span>阅读(<?php echo $value['read_time'];?>)</span>
        <span>回复(<?php echo $value['reply_time'];?>)</span>
    </span>
    <a href="javascript:go_blog('<?php echo $value['blog_id'];?>')" class="button">更多..</a>
</div>

<div class="clear v_space"></div>
<div class="clear v_space"></div>
<?php }?>
</div>

<div class="one_third_last">
<aside>
<div class="widget_container">
<h3>热门博客</h3>
<ul>
	<?php foreach ($hot_infos as $value) {?>
    <li>
        <div class="description">
            <p><strong><a href="<?php echo ADR_BLOG_PAGE_URL.'/'.$value['blog_id'];?>"><?php echo $value['title'];?></a></strong></p>
            <span class="entry_post">
            <span class="entry_date"><?php echo $value['blog_date'];?></span>
            	<span>阅读(<?php echo $value['read_time'];?>)</span>
        		<span>回复(<?php echo $value['reply_time'];?>)</span>
            </span>
        </div>
    </li>
    <?php }?>
</ul>
</div>

<div class="widget_container">
<h3>标签</h3>
<div class="tagcloud">
	<?php foreach ($label_infos as $value) {?>
    <a href="javascript:userLabel('<?php echo $value['name'];?>')"><?php echo $value['name'];?></a>
    <?php }?>
</div>
<form action="<?php echo ADR_BLOG_URL; ?>" method="post" id="label_form">
<input type="hidden" name="labelT" id="labelT"/>
</form>
<script type="text/javascript">
function userLabel(label){
	$('#labelT').val(label);
	$('#label_form').submit();
}
</script>
</div>

<div class="widget_container">
<script type="text/javascript">
$(document).ready(function() {
    //$.ajax({
    //    url: 'http://open.t.qq.com/api/statuses/user_timeline',
    //    type:'get',
    //    dataType: 'xml',
    //    data:{
	//		"pageflag": "0",
	//		"pagetime": "0",
	//		"reqnum": "5",
	//		"lastid": "0",
	//		"name": "yoaraSir",
	//		"type": "0",
	//		"contenttype": "UTF-8",
	//		"format": "xml",
	//		"appid": "801058005",
	//		"openid": "143F9D7A3DBD755ADAE9EB97844E305B",
	//		"openkey": "5040E14D3F74016DCEEB7AB5137ECAB8",
	//		"wbversion": "1",
	//		"pf": "php-sdk2.0beta",
	//		"sig": "O7HYURQCcevbeQjM7w8gFaKqn+Q="
    //   },
    //    success: function(data){
    //        $(data).find("data").find("info").each(function(index, ele) {
    //            var content_t = $(ele).find("text").text();
    //            var time_t = getLocalTime($(ele).find("timestamp").text());
    //            $("#twitter").append('<li><span>'+content_t+'</span><a href="#">'+time_t+'</a></li>');
    //        });
    //    }
    //});
});

</script>
<!-- <h3>最新微博</h3>
<ul class="twitter_list" id="twitter">

</ul> -->
</div>

</aside>
</div>

</section>
<!-- Content End -->
