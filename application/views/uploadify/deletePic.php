<?php require_once "application/config/My_constants.php";?>

<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC?>/css/uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
<script type="text/javascript">
function deleteImg(id,fileName){
	if(confirm("确定删除这张么")){
		$.ajax({
		   type: "POST",
		   url: "<?php echo ADR_ADMIN_PICTURE_DELETE_URL?>",
		   data: {
			   'file_id':id,
			   'file_name':fileName
		   },
		   success: function(msg){
			  $("#"+id).remove();
		   }
		}); 
	}
}
</script>

<div id="page_wrap">
	<h1>图片删除</h1>
<div class="demo">
	<ul id="list" class="image-grid_3col">
	<?php foreach ($pictureInfo as $value) {?>
		<li class="photo" id="<?php echo $value['ID'];?>">
		<div class="portfolio_content">
		<img src="<?php echo ADR_PRODUCT_PICTURE_ROOT_URL.$value['URL'];?>" alt="img" />
		<h4><a href="javascript:deleteImg('<?php echo $value['ID'];?>','<?php echo $value['URL'];?>')"><img src="<?php echo ROOT_YC?>/images/uploadify-cancel.png" style="width: 16px;height: 16px;min-width:0px"/></a></h4>
		</div>
		</li>
	<?php }?>
	</ul>
</div>
</div>
</body>
</html>