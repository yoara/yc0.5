<?php
require_once "application/config/My_constants.php";
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = './upload'; // Relative to the root and should match the upload folder in the uploader script
$targetName = iconv("UTF-8","GBK",$_POST['filename']);
if (file_exists($targetFolder . '/' . $targetName)) {
	echo 1;
} else {
	echo 0;
}
?>