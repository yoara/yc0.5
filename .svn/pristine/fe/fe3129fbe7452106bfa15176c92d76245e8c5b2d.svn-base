<?php require_once "application/config/My_constants.php";?>

<script src="<?php echo ROOT_YC?>/js/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC?>/css/uploadify.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
<script type="text/javascript">
function checkVal(obj){
	if(''==obj.value){
		obj.value = "没什么好介绍啦";
	}
}
function deleteImg(id,fileName){
	if(confirm("确定删除这张么")){
		$.ajax({
		   type: "POST",
		   url: "<?php echo ADR_ADMIN_PICTURE_CANCEL_URL?>",
		   data: "file_name="+fileName,
		   success: function(msg){
				$("#"+id).remove();
		   }
		}); 
	}
}
var imgUrl;
var imgName;
	function makeLiStr(imgUrl,imgName,fileName){
		return '<li class="photo" id="'+imgName+'">'+
		'<div class="portfolio_content">'+
		'<img src="'+imgUrl+'" alt="img" />'+
		'<h4>'+imgName+'<a href="javascript:deleteImg(\''+imgName+'\',\''+fileName+'\')"><img src="<?php echo ROOT_YC?>/images/uploadify-cancel.png" style="width: 16px;height: 16px;min-width:0px"/></a>'+'</h4>'+
		'<p><input type="radio" name="is_show" value="'+fileName+'">'+
		'<input type="hidden" name="imgUrl[]" value="'+fileName+'"></p>'+
		'</div>'+
		'</li>';
	}
	$(function() {
		$('#file_upload').uploadify({
			'swf'      : '<?php echo ROOT_YC?>/images/uploadify.swf',
			'uploader' : '<?php echo ADR_ADMIN_PICTURE_UP_URL?>',
			//'queueSizeLimit':3,
			//'removeCompleted':false,
			//'debug':true,
			'uploadLimit':3,
			'formData'		  :{
				'user_agent'  :'<?php echo $user_agent;?>'
			},
			'onUploadSuccess' : function(file, data, response) {
				if('1'!=data){
		            alert('上传出错：'+data);
				}
				//subObj(file);
				imgUrl = "<?php echo ROOT_YC?>/upload/"+file.name;
				imgName = file.name.split(".")[0];
				var liStr = makeLiStr(imgUrl,imgName,file.name);
				$('#list').append(liStr);
	        }
		});
	});
	function subObj(obj){
        $.each(obj,function(key,val){
            if($.isPlainObject(val) || $.isArray(val)){
                subObj(val);
            }else{
                alert(key+'='+val);
            }
        });
    }
    function proSure(){
		var lis = $("li.photo");
		if(lis.size()==0){
			alert("请至少上传一张图片");
			return;
		}

		if($('#pro_upload').val()==''){
			alert("请选择产品上传");
			return;
		}

		if($('#product_name').val()==''){
			alert("请输入产品名");
			$('#product_name').focus();
			return;
		}
		var show = $("input[name='is_show']:checked");
		if(typeof($("input[name='is_show']:checked").val())=="undefined"){
			alert("请选择主显图片");
			return;
		}
		
		$("#proUp-form").submit();
    }
</script>

<div id="page_wrap">
	<h1>产品上传</h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>
<form method="post" action="<?php echo ADR_ADMIN_PRODUCT_DB_INSERT;?>" name="proUp-form" id="proUp-form" enctype="multipart/form-data">
	<div class="demo">
		<ul id="list" class="image-grid_3col"></ul>
	</div>
	
	
	<input type="file" id="pro_upload" name="pro_upload"/><br/>
	<label for="product_name">产品名</label><br/>
	<input type="text" id="product_name" name="product_name"/><br/>
	<label for="short_memo">短介绍</label><br/>
	<input type="text" id="short_memo" name="short_memo" value="简单介绍"/><br/>
	<label for="memo">详细介绍</label><br/>
	<textarea name="memo" id="memo" cols="30" rows="10" value="介绍" onmouseout="checkVal(this)"></textarea><br/>
	<h1><a href="javascript:proSure()">产品上传</a></h1>
</form>
</div>
<div id="errMes"></div>
</body>
</html>