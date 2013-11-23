<?php require_once "application/config/My_constants.php";?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
ul li{
	padding-bottom: 20px;
}
</style>
</head>
<body>
<ul >
<li><a href="<?php echo ADR_ADMIN_PICTURE_URL?>" >上传图片</a>——<a href="<?php echo ADR_ADMIN_PICTURE_GO_DELETE_URL?>" >删除图片</a></li>
<li><a href="<?php echo ADR_ADMIN_PRODUCT_URL?>" >上传产品</a>——<a href="<?php echo ADR_ADMIN_PRODUCT_GO_DELETE_URL?>" >删除产品</a></li>

<li><a href="<?php echo ADR_ADMIN_GO_BLOG_URL?>" >写博客</a>——<a href="<?php echo ADR_ADMIN_BLOG_LIST_URL?>" >博客管理</a></li>
<li><a href="<?php echo ADR_HOME_URL?>" >返回首页</a></li>
<li><a href="<?php echo ADR_LOGIN_OUT_URL?>" >退出登录</a></li>
</ul>
</body>
</html>