<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Page</title>
</head>
<body>

	<a href="member-list.php"> Show records </a>
	
	<?php
	require_once 'head.php';
	
	$userId = $_GET['userId'];
	
	require_once 'db.php';
	
	// created the SQL DELETE command
	$sql = "DELETE FROM users
								WHERE userId = :userId";
	
	// pass the userId parameter to the command
	$cmd = $db->prepare($sql);
	$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
	
	// execute the deletion
	$cmd->execute();
	
	// disconnect
	$db = null;
	
	
	echo 'Deleted';

	require_once 'foot.php';
	?>

</html>