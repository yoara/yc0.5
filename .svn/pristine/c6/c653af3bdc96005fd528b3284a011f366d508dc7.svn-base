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
		'<p><input type="text" name="imgName[]" size="30" value="'+imgName+'"/>'+
		'<input type="hidden" name="imgUrl[]" value="'+fileName+'"></p>'+
		'<p><textarea name="imgMemo[]" cols="30" rows="10" style="width:70%" value="介绍" onmouseout="checkVal(this)"></textarea></p>'+
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
			//'uploadLimit':3,
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
    function imgSure(){
		var lis = $("li.photo");
		if(lis.size()==0){
			alert("请至少上传一张图片");
		}
		var names = $("input[name='imgName']");
		var memos = $("input[name='imgMemo']");
		for(var i;i<names.size();i++){
			if(names[i].val()==''){
				alert("请输入图片名");
				names[i].focus();
				return;
			}
			if(memos[i].val()==''){
				alert("请输入图片简介");
				memos[i].focus();
				return;
			}
		}
		$("#imgUp-form").submit();
    }
</script>

<div id="page_wrap">
	<h1><a href="javascript:imgSure()">图片上传</a></h1>
	<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>
<form method="post" action="<?php echo ADR_ADMIN_PICTURE_DB_INSERT;?>" name="imgUp-form" id="imgUp-form" >
	<div class="demo">
		<ul id="list" class="image-grid_3col"></ul>
	</div>
</form>
</div>
<div id="errMes"></div>
</body>
</html>