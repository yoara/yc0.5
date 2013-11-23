<?php
$targetFolder = './upload'; // Relative to the root
$root = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'upload';
$_file_here = iconv("UTF-8",LOCALE_CHARACTER,$targetFolder . '/' . $file_name);
if (file_exists($_file_here)) {
	if(unlink($_file_here)){
		echo "1";
	}else{
		echo "0";
	}
}