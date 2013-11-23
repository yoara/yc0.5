<?php require_once "application/config/My_constants.php";?>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC?>/css/messagePage.css" />
<script type="text/javascript" src="<?php echo ROOT_YC?>/js/scrollpagination.js"></script>
<script type="text/javascript">
$(function(){
	$('#messageContent').scrollPagination({
		'contentPage': '<?php echo ADR_MESSAGE_AJAX_INFOS_URL;?>', // the url you are fetching the results
		'contentData': {}, // these are the variables you can pass to the request, for example: children().size() to know which page you are
		'scrollTarget': $(window), // who gonna scroll? in this example, the full window
		'heightOffset': 10, // it gonna request when scroll is 10 pixels before the page ends
		'beforeLoad': function(){ // before load function, you can display a preloader div
			this.contentData = {'offset':$('#messageContent').children().size()};
			$('#loading').fadeIn();	
		},
		'afterLoad': function(elementsLoaded){ // after loading content, you can use this function to animate your new elements
			 $('#loading').fadeOut();
			 $(elementsLoaded).fadeInWithDelay();
			 if (elementsLoaded.children().size() == 0){ // if more than 100 results already loaded, then stop pagination (only for testing)
				$('#nomoreresults').fadeIn();
				$('#messageContent').stopScrollPagination();
			 }
			 if (elementsLoaded.children().size() < 10){ // if more than 100 results already loaded, then stop pagination (only for testing)
				$('#nomoreresults').fadeIn();
				$('#messageContent').stopScrollPagination();
			 }
		}
	});
	
	// code for fade in element by element
	$.fn.fadeInWithDelay = function(){
		var delay = 0;
		return this.each(function(){
			$(this).delay(delay).animate({opacity:1}, 100);
			delay += 50;
		});
	};
		   
});
function liVar (id,name,email,content){ 
	var now = new Date(); 
	var nowStr = now.format("yyyy-MM-dd hh:mm:ss"); 
	return '<li id='+id+' style="display:none">'+
	'<h1><span>时间：'+nowStr+'</span><span>姓名：'+name+'</span>'+
	'<span>邮箱：'+email+'</span><a onclick="javascript:reply(\''+name+'\')" style="cursor: pointer;">回复</a>'+
	'</h1>'+
	'<p>'+content+'</p></li>';
}
function insertMes(){
	var name = $('#message_name').val();
	var email = $('#message_email').val();
	var content = $('#message_content').val();

	if(''==content){
		alert('请输入留言内容');
		return;
	}
	if(''==name){
		name='anyone';
		$('#message_name').val(name);
	}
	if(''==email){
		email = 'any@mail';
		$('#message_email').val(email);
	}
	$.ajax({
	   type: "POST",
	   url: "<?php echo ADR_MESSAGE_AJAX_INSERT_URL;?>",
	   data: {
			'message_content':content,
			'message_email':email,
			'message_name':name
	   },
	   success: function(msg){
	     if('0'!=msg){
	    	var liMes = liVar(msg,name,email,content);
	    	$('#messageContent').prepend(liMes);
	    	$('#'+msg).fadeIn();
	    	//$('#messageContent').$(liMes).delay(0).animate({opacity:1}, 200);
	     }else{
			alert( "保存出错了TAT" + msg );
	     }
	   }
	});
}
function reply(name){
	var content = $('#message_content');
	content.val('@'+name+'： ');
	content.focus();
}
</script>
<!-- Content Start -->
<section id="content" class="tag_line" style="min-height:0px;">

<form method="post" name="contact-form" id="contact-form" >	
<div class="two_third">
<label for="message_content">留言内容:</label>
 <p><textarea name="message_content" id="message_content" cols="30" rows="10"></textarea></p>
</div>
<div class="one_third_last">
<div class="description">
<label for="message_name">姓名:</label>
 <p><input type="text" name="message_name" id="message_name" size="30" 
  <?php if($this->input->cookie('message_name')){?>
 	value="<?php echo $this->input->cookie('message_name');?>" 
 <?php }?>
 /></p>
</div>
<div class="description">
<label for="message_email">邮件:</label>
 <p><input type="text" name="message_email" id="message_email" size="30" 
   <?php if($this->input->cookie('message_email')){?>
 	value="<?php echo $this->input->cookie('message_email');?>" 
 <?php }?>
 /></p>
 </div>
 <p><input class="contact_button button" type="button" onclick="insertMes()" id="messageBtn" value="留言" style="height: 100%;"/></p>
</div>
</form>
</section>				

<div class="clear"></div>

<div id="messageBoard">
<ul id="messageContent">
		<?php foreach ($messageInfo as $value) {?>
			<li>
    			<h1><span>时间：<?php echo $value['message_date'];?></span>
    				<span>姓名：<?php echo $value['message_name'];?></span>
    				<span>邮箱：<?php echo $value['message_email'];?></span>
    				<a onclick="javascript:reply('<?php echo $value['message_name'];?>')" style="cursor: pointer;">回复</a>
    				</h1>
    			<p><?php echo $value['message_content'];?></p>
    		</li>		
		<?php }?>
    </ul>
    <div class="messageBoardloading" id="loading">请稍后，加载中...</div>
    <div class="messageBoardloading" id="nomoreresults">已经是全部了...</div>
</div>

<div class="clear"></div>
<div class="one_half" style="text-align: center;float:right;width: 200px;">
    <h3>Ciara</h3>
    <p>人称小狼，百无聊赖的设计天才</p>
    <span class="contact_info">
        <img alt="扫描二维码" src="<?php echo ROOT_YC?>/images/yoaraCard.png"/>
    </span>
</div>

<div class="one_half_last" style="text-align: center;width: 200px;">
    <h3>Yoara</h3>
    <p>屌丝</p>
    <span class="contact_info">
        <img alt="扫描二维码" src="<?php echo ROOT_YC?>/images/yoaraCard.png"/>
    </span>
</div>
<div class="clear"></div>
<!-- Content Start -->
