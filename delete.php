<?php
session_start();

$existuser = $_GET['id'];
	include_once 'config.php';

    $sql = "DELETE FROM users WHERE username='$existuser'";

	if (mysqli_query($conn, $sql)) {

	    header('Location: records.php?status=delete_success');

	} else {
	
	     header('Location: records.php?status=update_success');
	}
	
?>