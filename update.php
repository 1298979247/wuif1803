<?php
//定义一个数组，包含连接数据库的各种信息
$db=array(
    "dsn"=>"mysql:host=localhost;dbname=news;port=3306;charset=utf8",
    "host"=>"localhost",
    "dbname"=>"news",
    "port"=>"3306",
    "username"=>"root",
    "password"=>"",
    "charset"=>"utf8"
);

//连接数据库
$options=array(
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
);

try{
    $pdo=new PDO($db["dsn"],$db["username"],$db["password"],$options);
}catch (PDOException $e){
    die("数据库连接失败:".$e->getMessage());
}


$clas=$_GET['class'];
echo $clas;
$id=$_GET['id'];
echo $id;
$valu=$_GET['valu'];
//$count  =  $pdo->exec("update news set $clas=$valu where id = $id");
//echo $count;
//
//include ('index.html');

$count  =  $pdo->prepare("update news set ?=? where id =?");
$count  ->bindValue('1',"".$_GET["class"]);
$count  ->bindValue('2',"".$_GET["valu"]);
$count  ->bindValue('3',"".$_GET["id"]);
$abc=$count  ->execute();
echo $abc;