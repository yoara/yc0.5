<?php require_once "application/config/My_constants.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php echo $home_address;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/layout.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/flexslider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/sudo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/jqueryslidemenu.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/blog.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/portfolio.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/quicksand.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/skin.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ROOT_YC;?>/css/responsive.css" />
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/jqueryslidemenu.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/jquery.sudoSlider.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/quicksand.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/portfolio_sortable.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/custom.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="<?php echo ROOT_YC;?>/js/timeUtil.js"></script>
<script type="text/javascript">
//class="active"初始化激活标签
jQuery(document).ready(function() {
	var urlPrama = "<?php echo $home_address;?>";
	switch (urlPrama) {
		case "<?php echo ADR_HOME;?>":
			$("#header_home").addClass("active");
			break;
		case "<?php echo ADR_ABOUTUS;?>":
			$("#header_aboutus").addClass("active");
			break;
		case "<?php echo ADR_PRODUCT;?>":
			$("#header_product").addClass("active");
			break;
		case "<?php echo ADR_BLOG;?>":
			$("#header_blog").addClass("active");
			break;
		case "<?php echo ADR_MESSAGE;?>":
			$("#header_message").addClass("active");
			break;
		default:
			$("#header_home").addClass("active");
	}
});
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="page_wrap">
<!-- Header Start -->
<header>
    <div class="logo">
    	<a href="<?php echo ADR_HOME_URL;?>"><img src="<?php echo ROOT_YC;?>/images/logo.png" alt="img" /></a>
    </div>

    <nav>
    <div id="myslidemenu" class="jqueryslidemenu">
        <ul>
            <li><a id="header_home" href="<?php echo ADR_HOME_URL;?>"><?php echo ADR_HOME;?></a></li>
            <li><a id="header_product" href="<?php echo ADR_PRODUCT_URL;?>"><?php echo ADR_PRODUCT;?></a>
            <ul>
                <li><a href="<?php echo ADR_PRODUCT_PICTURE_URL;?>"><?php echo ADR_PRODUCT_PICTURE;?></a></li>
                <li><a href="<?php echo ADR_PRODUCT_PRODUCT_URL;?>"><?php echo ADR_PRODUCT_PRODUCT;?></a></li>
            </ul>
            </li>
            <li><a id="header_blog" href="<?php echo ADR_BLOG_URL;?>"><?php echo ADR_BLOG;?></a></li>
            <li><a id="header_message" href="<?php echo ADR_MESSAGE_URL;?>"><?php echo ADR_MESSAGE;?></a></li>
            <li><a id="header_aboutus" href="<?php echo ADR_ABOUTUS_URL;?>"><?php echo ADR_ABOUTUS;?></a></li>
        </ul>
    </div>
    </nav>
</header>
<!-- Header End -->

<!-- Sub Header Start -->
<div class="sub_header">

<div class="sub_header_title">
    <h2><?php echo $home_address;?></h2>
    <div class="sub_header_description">
        <span>您的位置: </span>
        <span><a href="<?php echo ADR_HOME_URL;?>"><?php echo ADR_HOME;?> &raquo;</a></span>
        <?php if($home_address_3!=""){?>
        	<span><a href="<?php echo ADR_PRODUCT_URL;?>"><?php echo ADR_PRODUCT?> &raquo;</a></span>
        	<span><a href="<?php echo $home_address_2_url;?>"><?php echo $home_address_2?> &raquo;</a></span>
        	<span class="page"><?php echo $home_address_3;?></span>
        
        <?php }else if($home_address_2!=""){?>
        	<span><a href="<?php echo ADR_PRODUCT_URL;?>"><?php echo ADR_PRODUCT?> &raquo;</a></span>
        	<span class="page"><?php echo $home_address_2;?></span>
        <?php }else{?>
        <span class="page"><?php echo $home_address;?></span>
        <?php }?>
	</div>
</div>

<div class="search_box">
    <form name="f1" onsubmit="return g(this)">
	    <p>
	    <input id="error_search" type="text" placeholder="Search..." name="s" />
	    <input name=tn type=hidden value="bds" />
		<input name=cl type=hidden value="3" />
		<input name=ct type=hidden />
		<input name=ie type=hidden value=utf-8 />
		<input name=si type=hidden value="<?php echo DOMAIN_RC;?>" />
	    <input type="submit" value="" />
	    </p>
    </form>
</div>
<script language=javascript>
function g(formname)	{
var url = "http://www.baidu.com/baidu";
if (formname.s[1].checked) {
	formname.ct.value = "2097152";
}
else {
	formname.ct.value = "0";
}
formname.action = url;
return true;
}
</script>
</div>
<!-- Sub Header End -->