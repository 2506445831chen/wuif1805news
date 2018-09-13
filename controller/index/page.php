<?php
include '../core/db.php';

class page extends db
{
  const PER_PAGE = 4;
//  首页
  public function index()
  {
//接收分类id
//    if (isset($_GET['cid'])) {
//      $cid = $_GET['cid'];
//    } else {
//      $cid = 1;
//    }
////接收页数
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }

      $fixed = $this->pdo
          ->query('select * from title where is_default = "2" ')
          ->fetchAll();
      $default = $this->pdo
          ->query('select * from title where is_default = "1" ')
          ->fetchAll();
////分类
//    $category = $this->pdo
//      ->query('select * from news where is_default = "1" ')
//      ->fetchAll();
//
////某个分类下的总条数
//    $num = $this->pdo
////      ->query('select count(*) as total from news where cid =' . $cid)
////      ->fetch()['total'];
//
////总页数
//    $page_total = ceil($num / $this::PER_PAGE);
//
////新闻
//    $news = $this->pdo
//      ->query(
//        'select * from news where cid= ' . $cid . ' limit '.$this::PER_PAGE.' offset ' . ($page - 1) * $this::PER_PAGE
//      )
//      ->fetchAll();
      $news = $this->pdo
          ->query('select * from title3  limit '.$this::PER_PAGE*$page.' offset ' . ($page - 1) * $this::PER_PAGE)
          ->fetchAll();
//      var_dump($category);
    include '../views/index/index.html';
  }
    public function add()
    {
        // 查三次
        // 查固定一直在的      2
        // 查默认存在的        1
        // 查其他不存在的      0
        $fixed = $this->pdo
            ->query('select * from category where is_default = "2" ')
            ->fetchAll();
        $default = $this->pdo
            ->query('select * from category where is_default = "1" ')
            ->fetchAll();
        $other = $this->pdo
            ->query('select * from category where is_default = "0" ')
            ->fetchAll();
        include '../view/index/add.html';
    }
    //主页js发送的ajax（加载更多以及更换选项卡内容）
    public function dataResources(){
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];
        } else {
            $cid = 1;
        }

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $news = $this->pdo
            ->query(
                'select * from title3 where cid= ' . $_GET['cid'] . ' limit '.$this::PER_PAGE.' offset ' . ($page - 1) * $this::PER_PAGE
            )
            ->fetchAll();

        echo json_encode($news);
    }


    public function update()
    {
        if( $_GET['x'] == 1){
            $stmt = $this->pdo->prepare("update title set is_default = ? where id = ?");
            $stmt->bindValue(1, "0");
            $stmt->bindValue(2, $_GET["id"]);
            echo $stmt->execute();
        }elseif ( $_GET['x'] == 0){
            $stmt = $this->pdo->prepare("update title set is_default = ? where id = ?");
//            console.log(id);
            $stmt->bindValue(1, "1");
            $stmt->bindValue(2, $_GET["id"]);
            echo $stmt->execute();
        }
    }
//  分类页面
  public function category()
  {
    // 查两次
    // 查默认的
    // 查其他的
    $category = $this->pdo
      ->query('select * from title where is_default = "1"  ')
      ->fetchAll();

    $newlook = $this->pdo
        ->query('select * from title  where is_default = "0" ')
        ->fetchAll();
    include '../views/index/nav.html';
  }
//
  public function search()
  {
    if(isset($_GET['s'])){
      $keyword = $_GET['s'];
    }else{
      $keyword = '';
    }
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $results = $this->pdo
      ->query('select * from title3 where title like "%'.$keyword.'%" limit '.$this::PER_PAGE.' offset '.($page-1)*$this::PER_PAGE)
      ->fetchAll();
//      echo json_encode($results);
    include '../views/index/search.html';
  }

}



// 前台3个页面
//      ajax方式
// 中台 新闻管理   删除  分页
//      分类管理   删除  设置默认值  编辑
