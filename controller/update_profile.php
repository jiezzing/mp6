<?php 
	session_start(); 
	include '../connection.php';
	include '../model/queries.php';

	$con = new connection();
	$db = $con->connect();

	$update = new Queries($db);

	$update->prof_id = $_POST['id'];
	$name = $_POST['name'];
	$apartment = $_POST['apartment'];
	$landlord = $_POST['landlord'];
	$address = $_POST['address'];
	$talents = implode(", ", $_POST['talents']);

	$query = $update->updateProfile($name, $apartment, $landlord, $address, $talents);
    if($query)
        echo 'Success';
    else
        echo 'Failed';
?>