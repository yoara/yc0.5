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
			this.contentData = {'offset':$('#messageContent').children().size(),
								'blog_id':'<?php echo $result['blog_id'];?>'
					};
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
	var message_blog_id = '<?php echo $result['blog_id'];?>';

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
			'message_name':name,
			'blog_id':message_blog_id
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
<section id="content" >
<div class="post_meta">
    <span class="post_date">
        <h5><?php echo date('d',strtotime($result['blog_date']));?><br />
        	<?php echo date('M',strtotime($result['blog_date']));?></h5>
    </span>
    <span class="post_comment">
        <h5><?php echo $result['reply_time'];?></h5>
    </span>
</div>
<div class="post_content" style="float: left;">
    <h3><?php echo $result['title'];?></h3>
    <div><?php echo html_entity_decode($result['content']) ;?></div>
    <span class="blog_elements">
        <span class="post_by"><?php echo $result['audtor'];?></span>
        <span class="post_news"><?php echo $result['blog_date'];?></span>
        <span>阅读(<?php echo $result['read_time'];?>)</span>
        <span>回复(<?php echo $result['reply_time'];?>)</span>
    </span>
</div>

<div class="clear v_space"></div>
<div class="clear v_space"></div>
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

<div class="clear"></div>

<div id="messageBoard">
<ul id="messageContent">
		<?php foreach ($message_info as $value) {?>
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
</section>
<!-- Content End -->
