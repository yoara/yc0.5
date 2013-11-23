<?php require_once "application/config/My_constants.php";?>

<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC?>/css/uploadify.css">
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
function delSure(id,fileName){
	var checks = $('input[name="products"]:checked');
	if(checks.size()==0){
		alert("请至少选择一项");
		return;
	}
	if(confirm("确定删除么")){
		var file_id = '';
		checks.each(function(){
			file_id += this.value+',';
		});
		$.ajax({
		   type: "POST",
		   url: "<?php echo ADR_ADMIN_PRODUCT_DELETE_URL?>",
		   data: {
			   'file_id':file_id
		   },
		   success: function(msg){
		      checks.each(function(){
				$("#"+this.value).remove();
			  });
		   }
		}); 
	}
}
</script>

<div id="page_wrap">
	<h1><a href="javascript:delSure()">产品删除</a></h1>
<div class="demo">
	<ul id="list" >
	<?php foreach ($product_info as $value) {?>
		<li id="<?php echo $value['id'];?>">
		<input type="checkbox" name="products" value="<?php echo $value['id'];?>"/>
		<span><?php echo $value['product_name'];?></span>
		<span><?php echo $value['memo'];?></span>
		</li>
	<?php }?>
	</ul>
</div>
</div>
</body>
</html>