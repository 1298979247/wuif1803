<?php
class database{
    public $pdo;
    //连接数据库
    public function __construct(){
        $db=array(
            "dsn"=>'mysql:host=localhost;dbname=news;port=3306;charset=utf8',
            'host'=>'localhost',
            'port'=>'3306',
            'dbname'=>'news',
            'username'=>'root',
            'password'=>'',
            'charset'=>'utf8',
        );
        $options=array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        );

        try{
            $this->pdo=new PDO($db['dsn'],$db['username'],$db['password'],$options);
        }catch(PDOException $e){
            die('数据库连接失败：'.$e->getMessage());
        }
    }
}
class news extends database{
    public function actiondelete(){
        echo $count  =  $this->pdo->exec("delete from  news where id= ".$_GET['id']);
    }
    public function actioninsert(){
        $stmt = $this->pdo->prepare("insert into news(title,des,con)values(?,?,?)");
        $stmt->bindValue(1, ''.$_GET["title"]);
        $stmt->bindValue(2, ''.$_GET["des"]);
        $stmt->bindValue(3, ''.$_GET["con"]);
        $abc=$stmt->execute();
        echo $abc;
    }
    public function actionupdate(){
        $count  =  $this->pdo->prepare("update news set ?=? where id =?");
        $count  ->bindValue('1',"".$_GET["class"]);
        $count  ->bindValue('2',"".$_GET["valu"]);
        $count  ->bindValue('3',"".$_GET["id"]);
        $abc=$count  ->execute();
        echo $abc;
    }
    public function actionview(){
        $item=$this->pdo->query("select  * from news");
        $rows=$item->fetchAll();
        include ("index.html");
    }
}
class category extends database{

}
//$page=new news;
//if(!isset($_GET["action"])){
//    $method="actionview";
//}else{
//    $method="action".$_GET["action"];
//}
//$page->$method();
$class_name=$_GET["class"];
$action_name=$_GET["action"];
$o=new $class_name;
if(!isset($_GET["action"])){
    $method="actionview";
}else{
    $method="action".$_GET["action"];
}
$o->$method();
