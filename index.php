<?php
/**
 * ModAuthAdmin
 * Copyright (c) 2011 jason m horwitz | Sekati. All Rights Reserved.
 */
define('APP_NAME', 			'ModAuthAdmin');
define('APP_VERSION', 		'1.0.3');
define('APP_AUTHOR', 		'Jason M Horwitz');
define('APP_AUTHOR_URL', 	'http://cv.sekati.com');
define('APP_COMPANY', 		'Sekati');
define('APP_COMPANY_URL', 	'http://sekati.com');

require_once('config.inc.php');
require_once('scaffold.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<meta http-equiv="Content-language" content="en" /> 
<meta http-equiv= "pragma" content="no-cache" /> 
<meta name="robots" content="noindex,nofollow" /> 
<meta name="robots" content="noarchive" /> 
<link rel="icon" href="favicon.ico" />
<title>:: <?=APP_NAME?> :: </title>
<style type="text/css"> 
<!--
html,body { 
	}
body{
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	padding:15px;
}
#header {
	
}
#content {
	
}
#footer {
	font-size:10px;
	color: #666;
	text-align:right;
	position:absolute;
	top:90%;
	width:90%;
	border-top: 1px dotted #ccc;
	position:absolute;
	margin:0;
	padding-top:10px;
	float:right;
}
a,a:link,a:visited { text-decoration: none; color: #778da8; }
a:hover { color: #000; }
h2 {
	font-size:14px;
}
table {
	border:solid 1px #b7ddf2;
}
th {
	text-align: left;
	background:#ebf4fb;
	border-bottom:solid 1px #b7ddf2;
	padding: 5px 5px 5px 5px;
}
td {
	font-size:11px;
	color:#666;
	margin-bottom:20px;
	padding: 5px 10px 5px 5px;

}
p, h1, form, button{ border:0; margin:0; padding:0; }
img { border:none; }
img.icon { vertical-align:bottom; }
.spacer{ clear:both; height:1px; }
form { margin: 0 auto; padding: 14px; }
input {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;	
	font-size:12px;
	color:#666;	
	padding:2px 2px;
	border:solid 1px #aacfe4;
	background: #fff;
	margin-left: 10px;
}
option, select {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;	
	color:#666;
	margin: 5px;	
}
.button {
	background: #f7f7f7;
	border: 1px solid #b7ddf2;
}
-->
</style>
</head> 
<body>
<!-- HEADER -->
<div id="header">
	<a href="."><img src="images/logo.png" alt="SEKATI" border="0" /></a><br/><br/>
	<h2><a href="index.php"><img src="favicon.png" alt="logo" valign="middle" class="icon" /></a> &nbsp; <?=APP_NAME?></h2>
</div>
<!-- CONTENT -->
<div id="content">
<?php
	new Scaffold($db_host, $db_user, $db_password, $db_name, $db_table, 100, array('username', 'passwd', 'email', 'groups', 'enabled'), FALSE, 960);
?>
</div>
<!-- FOOTER -->
<div id="footer">
	<?=APP_NAME?> v<?=APP_VERSION?>. Copyright &copy; <?=date('Y')?> <a href="<?=APP_AUTHOR_URL?>"><?=APP_AUTHOR?></a> | <a href="<?=APP_COMPANY_URL?>"><?=APP_COMPANY?></a>. All Rights Reserved.
</div>
</body>
</html>