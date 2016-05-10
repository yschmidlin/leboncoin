<?php
session_start();
include_once('class/class_annonce.php');
include_once('data.php');
include_once('function.php');
include_once('traitement.php');

$page=NULL;
if(isset($_GET['page'])){
	$page='views/'.$_GET['page'].'.php';
}
if (!file_exists($page)){
	$page='views/home.php';
}
	
include($page);	

?>