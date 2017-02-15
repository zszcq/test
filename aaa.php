<?php
//$pdo = new PDO('mysql:host=127.0.0.1;dbname=test','root', 'rot');
for ($i=98; $i < 255; $i++) { 
	//创建对象 
$mysqli = mysqli_init(); 
//设置超时选项 
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 1); 
//连接 
@$mysqli->real_connect('192.168.1.'.$i, 'root', 'root', 'test'); 
//如果超时或者其他连接失败打印错误信息 
if (mysqli_connect_errno()) { 
	$error = '数据库192.168.1.'.$i.'连接失败!'."\r\n";
file_put_contents('./error.log', $error,8);
//$error[] = '数据库192.168.1.'.$i.'连接失败!'."\r\n";
//exit(); 
} else{
	//成功输出连接信息 
	$success = '数据库'.$mysqli->host_info.'连接成功!'."\r\n";
	file_put_contents('./success.log', $success,8);
//$success[] = '数据库'.$mysqli->host_info.'连接成功!'."\r\n";
}

//printf ("Connection: %s\n.", $mysqli->host_info); 
$mysqli->close(); 

//echo $error;

}
//var_dump($error);
foreach ($success as $key => $value) {
	file_put_contents('./success.log', $value,8);
}
foreach ($error as $key => $value) {
	file_put_contents('./error.log', $value,8);
}/**/


//mysqli_connect('192.168.1.3','root','root');






?>