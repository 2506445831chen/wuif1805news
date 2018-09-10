<?php
include '../core/db.php';

class admin extends db{
    const PER_PAGE = 6;
  public function index(){
//接收页数
      if (isset($_GET['page'])) {
          $page = $_GET['page'];
      } else {
          $page = 1;
      }
//      $cid=$this->pdo->query('select * from title')
//      //某个分类下的总条数
//      $num = $this->pdo
//          ->query('select count(*) as total from title where cid =' . $cid)
//          ->fetch()['total'];
//      console.log($num);
      $stmt = $this->pdo->query('select * from title3 limit '.$this::PER_PAGE.' offset '.$this::PER_PAGE*($page-1));
      $rows = $stmt->fetchAll();
//      echo json_encode('$stmt');
      include '../views/admin/admin.html';

  }

//分类
//    $category = $this->pdo
//      ->query('select * from news where is_default = "1" ')
//      ->fetchAll();
//
//某个分类下的总条数
//    $num = $this->pdo
//      ->query('select count(*) as total from news where cid =' . $cid)
//      ->fetch()['total'];

////总页数
//    $page_total = ceil($num / $this::PER_PAGE);
//
////新闻
//    $news = $this->pdo
//      ->query(
//        'select * from news where cid= ' . $cid . ' limit '.$this::PER_PAGE.' offset ' . ($page - 1) * $this::PER_PAGE
//      )
//      ->fetchAll();
//$news = $this->pdo
//->query('select * from news')
//->fetchAll();

};
