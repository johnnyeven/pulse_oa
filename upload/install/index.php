<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- End of Meta -->
		
		<!-- Page title -->
		<title>Pulse工作平台 - 安装配置</title>
		<!-- End of Page title -->
		
		<!-- Libraries -->
		<link type="text/css" href="../resources/css/login.css" rel="stylesheet" />	
		<link type="text/css" href="../resources/css/smoothness/jquery-ui-1.7.2.custom.html" rel="stylesheet" />	
		
		<script type="text/javascript" src="../resources/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../resources/js/easyTooltip.js"></script>
		<script type="text/javascript" src="../resources/js/jquery-ui-1.7.2.custom.min.js"></script>
		<!-- End of Libraries -->	
	</head>
	<body>
	<div id="container">
		<div class="logo">
			<a href="#"><img src="../resources/assets/logo.png" alt="" /></a>
		</div>
		<div id="box">
            <form method="post" action="install.php" id="myform">
                <p class="main">
                    <label for="hostname" style="width:120px;">主机地址</label>
                    <input name="hostname" id="hostname" type="input" value="localhost" />
                </p>
                <p class="main">
                    <label for="username" style="width:120px;">MySQL用户名</label>
                    <input name="username" id="username" type="input" value="root" />
                </p>
                <p class="main">
                    <label for="password" style="width:120px;">MySQL密码</label>
                    <input name="password" id="password" type="input" value="" />
                </p>
                <p class="main">
                    <label for="database" style="width:120px;">MySQL数据库名</label>
                    <input name="database" id="database" type="input" value="oa_db" />
                </p>
                <p class="main">
                    <label for="adminName" style="width:120px;">初始管理员帐号</label>
                    <input name="adminName" id="adminName" type="input" value="admin" />
                </p>
                <p class="main">
                    <label for="adminPass" style="width:120px;">初始管理员密码</label>
                    <input name="adminPass" id="adminPass" type="input" value="" />
                </p>
                <p class="space">
                    <input class="login" type="submit" value="开始安装" />
                </p>
            </form>
		</div>
	</div>

	</body>
</html>