<?php
include '../core/db.php';

class data extends db
{
    public function know()
    {
        $question = $this->pdo->query('select * from news ');
        $submit = $question->fetchAll();
        echo json_encode($submit);
    }

    public function insert()
    {
        $stmt = $this->pdo->prepare("insert into news ( title,dsc,image,pubtime,url )values(?,?,?,?,?)");
        $stmt->bindValue(1, $_GET['content']);
        $stmt->bindvalue(2, $_GET['dsc']);
        $stmt->bindvalue(3, $_GET['image']);
        $stmt->bindvalue(4, $_GET['pubtime']);
        $stmt->bindvalue(5, $_GET['url']);
        echo $stmt->execute();

    }

}