<?php
session_start();
	require_once 'conn.php';
	if (ISSET($_SESSION['id'])){

		$id=$_SESSION['id'];
	}
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
			
			$conn->query("INSERT INTO `task` VALUES('$id','', '$task', '')");
			header('location:index.php');
		}
	}
?>