<?php
$db=array(
    "dsn"=>'mysql:host=localhost;dbname=news;port=3306;charset=utf8',
    'host'=>'localhost',
    'port'=>'3306',
    'dbname'=>'news',
    'username'=>'root',
    'password'=>'',
    'charset'=>'utf8',
);
//链接
$options=array(
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
);

try{
    $pdo=new PDO($db['dsn'],$db['username'],$db['password'],$options);
}catch(PDOException $e){
    die('数据库连接失败：'.$e->getMessage());
}

echo $count  =  $pdo->exec("delete from  news where id= ".$_GET['id']);

