<?php
$className=$_GET['c'];
include '../controller/data/'.$className.'.php';
$method=$_GET['m'];
$data=new $className();
$data->$method();