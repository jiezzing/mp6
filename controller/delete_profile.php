<?php 
	session_start(); 
	include '../connection.php';
	include '../model/queries.php';

	$con = new connection();
	$db = $con->connect();

	$delete = new Queries($db);

	$delete->prof_id = $_POST['ids'];

	$query = $delete->deleteProfile();
    if($query)
        echo 'Success';
    else
        echo 'Failed';
?>