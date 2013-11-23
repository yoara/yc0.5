<?php
for ($i = 0; $i < sizeof($messageInfo); $i++) {
?>
<li id="<?php $messageInfo[$i]['id']?>" style="opacity:0;-moz-opacity: 0;filter: alpha(opacity=0);">
	<h1><span>时间：<?php echo $messageInfo[$i]['message_date'];?></span>
		<span>姓名：<?php echo $messageInfo[$i]['message_name'];?></span>
    	<span>邮箱：<?php echo $messageInfo[$i]['message_email'];?></span>
    	<a onclick="javascript:reply('<?php echo $messageInfo[$i]['message_name'];?>')" style="cursor: pointer;">回复</a></h1>
	<p><?php $messageInfo[$i]['message_content']?></p></li>
<?php }?>