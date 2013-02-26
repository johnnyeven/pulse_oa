<?php
include_once 'db/mysql.class.php';
include_once 'db/dbmanager.class.php';
error_reporting(0);
if($_POST)
{
	$hostname = trim($_POST['hostname']);
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$database = trim($_POST['database']);
	$adminName = trim($_POST['adminName']);
	$adminPass = trim($_POST['adminPass']);
	
	//连接数据库
	$db = new mysql($hostname, $username, $password, $database);
	if($db->errno()) {
		exit($db->error());
	}
	$db->close();
	
	if(empty($adminName) || empty($adminPass))
	{
		exit('必须创建管理员帐号');
	}
	
	//创建../application/config/database.php
	$file = fopen('../application/config/database.php', 'w');
	if($file)
	{
		$dbConfig = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
\$active_group = 'default';
\$active_record = TRUE;
		
\$db['default']['hostname'] = '{$hostname}';
\$db['default']['username'] = '{$username}';
\$db['default']['password'] = '{$password}';
\$db['default']['database'] = '{$database}';
\$db['default']['dbdriver'] = 'mysql';
\$db['default']['dbprefix'] = '';
\$db['default']['pconnect'] = FALSE;
\$db['default']['db_debug'] = FALSE;
\$db['default']['cache_on'] = FALSE;
\$db['default']['cachedir'] = '';
\$db['default']['char_set'] = 'utf8';
\$db['default']['dbcollat'] = 'utf8_general_ci';
\$db['default']['swap_pre'] = '';
\$db['default']['autoinit'] = TRUE;
\$db['default']['stricton'] = FALSE;
?>";
		
		if(!fwrite($file, $dbConfig))
		{
			fclose($file);
			exit('写入必要文件失败/application/config/database.php，请检查是否具备读写权限');
		}
		fclose($file);
		
		$dbM = new DBManager($hostname, $username, $password, $database);
		$segments = $dbM->createFromFile('data/data.sql',null);
		
		$adminPass = sha1(md5($adminPass));
		$sql = "insert into  `{$database}`.`platform_account` (`account_name` ,`account_pass` ,`account_level`, `recommand_change_pass`) VALUES ('{$adminName}',  '{$adminPass}', 999, 0)";
		
		array_push($segments, $sql);
		$dbM->saveByQuery($segments);
		
		exit('安装完成，为保证安全性，请手动删除该install目录，或者现在点击<a href="../login">这里</a>进入系统');
	}
	else
	{
		exit('创建必要文件失败/application/config/database.php，请检查是否具备读写权限');
	}
}
?>