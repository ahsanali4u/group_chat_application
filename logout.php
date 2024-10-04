<?php
require_once("require/database_class.php");

session_start();
    $database = new Database_connection(hostname,username,password,database);

	$query = "UPDATE users u SET online_status = '0' WHERE u.user_id='".$_SESSION['user']['user_id']."'";
	$database->execute_query($query);

session_destroy();
header("location:login.php?msg=Logout Successfully");

?>