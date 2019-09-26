<?php 
	session_start(); 
	include '../connection.php';
	include '../model/queries.php';

	$con = new connection();
	$db = $con->connect();

	$insert = new Queries($db);

    // Values to be inserted pointing to  model->queries.php insertProfile() function
	$insert->prof_name = $_POST['name'];
	$insert->prof_apartment = $_POST['apartment'];
	$insert->prof_landlord = $_POST['landlord'];
	$insert->prof_address = $_POST['address'];
    $insert->prof_talents = implode(", ", $_POST['talents']);

    // Performs data insertion to the database
	$query = $insert->insertProfile();
    if($query)
        echo 'Success';
    else
        echo 'Failed';
?>