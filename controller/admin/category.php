<?php
include '../core/db.php';
class category extends db{
    const PER_PAGE = 6;
    public function index(){
//        $stmt = $this->pdo->query('select * from title');
//        $rows = $stmt->fetchAll();
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
//      $id=$this->pdo->query('select * from title');
//        $cid=$id->fetch();
//       echo $cid;
//      //某个分类下的总条数
//      $num = $this->pdo->query('select count(*) as total from title where cid ='.$cid)
//          ->fetch()['total'];

        $stmts = $this->pdo->query('select * from title limit '.$this::PER_PAGE.' offset '.$this::PER_PAGE*($page-1));
        $rows = $stmts->fetchAll();
//      echo json_encode('$stmt');
        include '../views/admin/category.html';
    }
}

