<?php
$classname = $_GET['c'];
include '../controller/admin/'.$classname.'.php';
$admin =new $classname();
$method = $_GET['m'];
$admin->$method();