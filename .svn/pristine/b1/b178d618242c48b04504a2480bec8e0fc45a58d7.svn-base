<?php require_once "application/config/My_constants.php";?>
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
#list li {
	margin: 20px 0 20px 0;
}
#list li span{
	margin-left: 30px;
}
</style>
<script type="text/javascript">
function deleteBlog(id){
	if(confirm("确定要删除么")){
		$("#blog_id").val(id);
		$("#f_list").submit();
	}
}
function editBlog(id){
	$("#blog_id").val(id);
	$("#f_list").attr("action",'<?php echo ADR_ADMIN_GO_BLOG_URL;?>');
	$("#f_list").submit();
}
</script>
<div id="page_wrap">
	<h1>博客管理</h1>
<div class="demo">
	<ul id="list" >
	<?php foreach ($blog_info as $value) {?>
		<li id="<?php echo $value['blog_id'];?>">
		<span><?php echo $value['title'];?></span>
		<span><?php echo $value['short_content'];?></span>
		
		<input type="button" value="删除" onclick="deleteBlog('<?php echo $value['blog_id'];?>')" style="float: right;"/>
		<input type="button" value="编辑" onclick="editBlog('<?php echo $value['blog_id'];?>')" style="float: right;margin-left: 5px"/>
		</li>
	<?php }?>
	</ul>
</div>
</div>
<form action="<?php echo ADR_ADMIN_DELETE_BLOG_URL;?>" method="post" id="f_list">
<input type="hidden" id="blog_id" name="blog_id"/>
</form>
</body>
</html>