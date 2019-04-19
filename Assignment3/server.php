<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'assignment3');		//connect database

	//initialize variables 
	$id = 0;
	$creator = "";
	$title = "";
	$type = "";
	$identifier = "";
	$date = "";
	$language = "";
	$description = "";
	$update = false;

	
	//inserting records
	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$creator = $_POST['creator'];
		$title = $_POST['title'];
		$type = $_POST['type'];
		$identifier = $_POST['identifier'];
		$date = $_POST['date'];
		$language = $_POST['language'];
		$description = $_POST['description'];
		
		mysqli_query($db, "INSERT INTO ebook_metadata (id, creator, title, type, identifier, date, language, description) VALUES ('$id', '$creator', '$title', '$type', '$identifier','$date', '$language', '$description')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: SPA.php');
	}




//updating records
	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$creator = $_POST['creator'];
		$title = $_POST['title'];
		$type = $_POST['type'];
		$identifier = $_POST['identifier'];
		$date = $_POST['date'];
		$language = $_POST['language'];
		$description = $_POST['description'];
		
		mysqli_query($db,"Update ebook_metadata SET creator = '$creator', title ='$title', type ='$type', identifier = '$identifier', date ='$date', language ='$language', description ='$description' WHERE id=$id");
		$_SESSION['message'] = "Address Updated!"; 
		header('location: SPA.php');
	}






//deleting records
	if (isset($_GET['del'])){
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM ebook_metadata WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: SPA.php');
}



