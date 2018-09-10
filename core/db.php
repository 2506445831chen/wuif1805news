<?php
class db{
    public $pdo;
    public function __construct()
    {
        $db = array(
            'dsn' => 'mysql:host=localhost;dbname=news;charset=utf8',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        );
//连接
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );

//检验连接
        try {
            $this->pdo = new PDO($db['dsn'], $db['username'], $db['password'], $options);
        } catch (PDOException $e) {
            die('数据库连接失败:' . $e->getMessage());
        };

    }
}

