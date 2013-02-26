<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- End of Meta -->
		
		<!-- Page title -->
		<title><?php echo $this->config->item('global_site_name'); ?> - 工作平台 - 登录</title>
		<!-- End of Page title -->
		
		<!-- Libraries -->
		<link type="text/css" href="<?php echo site_url("resources/css/login.css"); ?>" rel="stylesheet" />	
		<link type="text/css" href="<?php echo site_url("resources/css/smoothness/jquery-ui-1.7.2.custom.html"); ?>" rel="stylesheet" />	
		
		<script type="text/javascript" src="<?php echo site_url("resources/js/jquery-1.3.2.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("resources/js/easyTooltip.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo site_url("resources/js/jquery-ui-1.7.2.custom.min.js"); ?>"></script>
		<!-- End of Libraries -->	
	</head>
	<body>
	<div id="container">
		<div class="logo">
			<a href="#"><img src="<?php echo site_url("resources/assets/logo.png"); ?>" alt="" /></a>
		</div>
		<div id="box">
			<form action="<?php echo site_url("login/submit"); ?>" method="post">
			<p class="main">
            	<input type="hidden" id="redirect" name="redirect" value="<?php echo $redirect; ?>" />
				<label>姓名/工号: </label>
				<input type="input" name="accountName" id="accountName" /> 
				<label>密码: </label>
				<input type="input" name="accountPass" id="accountPass" />
			</p>

			<p class="space">
				<span><input type="checkbox" id="cookieRemain" name="cookieRemain" value="1" />自动登录</span>
				<input type="submit" value="登录" class="login" />
			</p>
			</form>
		</div>
	</div>

	</body>
</html>