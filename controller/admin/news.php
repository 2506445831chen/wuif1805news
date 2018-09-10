<?php
include '../core/db.php';

class news extends db{
    public function actiondelete(){
        $stmt = $this->pdo->prepare("delete from  title where id = ?");
        $stmt->bindValue(1, $_GET["id"]);
        echo $stmt->execute();
    }
    public function actionupdate(){
        $stmt = $this->pdo->prepare('update title set '.$_GET["k"].'=? where id=?' );
        $stmt->bindValue(1, $_GET["v"]);
        $stmt->bindValue(2, $_GET["id"]);
        echo $stmt->execute();
    }
    public function actioninsert(){
        $stmt = $this->pdo->prepare("insert into title(title,id,is_default,cid)values(?,?,?,?)");
        $stmt->bindValue(1,'');
        $stmt->bindValue(2,'');
        $stmt->bindValue(3,'');
        $stmt->bindValue(4,'');
        echo $stmt->execute();
    }
//    public function actionview(){
//        $stmt = $this->pdo->query('select * from title');
//        $rows = $stmt->fetchAll();
//        include ('news.php');
//    }

}
