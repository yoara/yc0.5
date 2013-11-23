<?php require_once "application/config/My_constants.php";?>
<script type="text/javascript" src="<?php echo ROOT_YC?>/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea#p_content",
    height: 400,
    plugins: [
              "advlist autolink lists link image charmap print preview anchor",
              "searchreplace visualblocks code fullscreen",
              "insertdatetime media table contextmenu paste fullpage"
          ],
    fullpage_default_encoding: "UTF-8",
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image "
});
function addbox(){
	if($('#addInput').val()==''){
		alert('请输入标签名');
		$('#addInput').focus();
		return ;
	}
	$('#label_boxs').append('<input type="checkbox" checked value="'+$('#addInput').val()+'" name="labels[]"/><span onclick="deleteLabel(this)" style="cursor: pointer;color: red;">'+$('#addInput').val()+'</span>');
	$('#addInput').val('');
}
function doSubmit(){
	if($('#title').val()==''){
		alert('请输入标题');
		$('#title').focus();
		return ;
	}
	if($('#short_content').val()==''){
		alert('请输入博文短序');
		$('#short_content').focus();
		return ;
	}
	var labels = $('input[type=checkbox]:checked');
	if(labels.size()==0){
		alert('请至少勾选一项标签');
		return;
	}
	if('<?php echo $blog_info['title'];?>'!=''){
		$('#blogForm').attr('action','<?php echo ADR_ADMIN_EDIT_BLOG_URL;?>');
	}
	$('#blogForm').submit();
}
function deleteLabel(obj){
	if(confirm('确定删除该标签么')){
		$('input[value='+$(obj).html()+']').remove();
		$(obj).remove();
	}
}
</script>

<div id="page_wrap" style="padding-top: 50px;">
<form method="post" action="<?php echo ADR_ADMIN_INSERT_BLOG_URL;?>" id="blogForm">
	<?php if($blog_info['title']!==''){?>
		<input name="blog_id" type="hidden" id="blog_id" value="<?php echo $blog_info['blog_id'];?>"/>
	<?php }?>
	<div><label for="title" style="font-weight: bold;">标题</label>
	<input name="title" id="title" value="<?php echo $blog_info['title'];?>"/></div>
	
	<div><label for="short_content" style="font-weight: bold;">短序</label><br/>
	<textarea name="short_content" id="short_content" cols="80" rows="5"><?php echo $blog_info['short_content'];?></textarea></div>
    <textarea name="content" id="p_content"><?php echo $blog_info['content'];?></textarea>
	<label style="font-weight: bold;">标签：</label><span id="label_boxs"></span>
	<input id="addInput" name="addInput" size="5"><label for="" onclick="addbox()" style="cursor: pointer;color: blue;">增加标签</label>
    
    <div style="margin-top: 20px;"><input type="button" value="提交" onclick="doSubmit()"></div>
    <script type="text/javascript">
    <?php if($blog_info['title']!==''){//修改博文
    		$labels = explode(";", $blog_info['label']);
   			foreach ($labels as $value) {
				if($value!==''){
	?>
				$('#addInput').val('<?php echo $value;?>');
				addbox();
	<?php
				}
			}
    ?>
    <?php }else{//新增博文	?>	
    	
		$('#addInput').val('杂文');
		addbox();
    	
    <?php }?>
    </script>
</form>
</div>
</body>
</html>