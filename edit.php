<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Page</title>
</head>
	<body>
	<?php
		
		 require_once 'head.php';
		
// save inputs
$userId = $_POST['userId'];
$nickName = $_POST['nickName'];
$phoneno = $_POST['phoneno'];

	
// validating inputs
$ok = true; 


// strlen is a PHP function that shows the length of a string value
if (strlen($name) >50) {
    echo 'Name must be less than or equal to 50 characters <br />';
    $ok = false;
}

if (strlen($nickName) >20) {
    echo 'Nickame must be less than or equal to 20 characters <br />';
    $ok = false;
}
	
if (strlen($phoneno)==10) {
    echo 'Write correct phone no.<br />';
    $ok = false;
}

// if the form ok
if ($ok == true)
{
    // connect
 require_once 'db.php';

	 //editing if clubId is available
    if ($userId)
	{
        
    // setting up the new record
    $sql = " UPDATE users 
				 SET 	name=:name,
				 		nickName =:nickName, 
						phoneno = :phoneno 
				 WHERE userId = :userId
				 ";
		$cmd = $db->prepare($sql);
	$cmd->bindParam(':userId', $userId, PDO::PARAM_INT);
	
	// execute 
	$cmd->execute();
	
	// disconnect
	$db = null;
	
		 echo 'Edited';	
}
	
	//if conditions not satisfied
	else
	{
		echo 'Error Occured';
	}
	
	 require_once 'foot.php';
?>
	
<a href="member-list.php"> Show records </a>


</body>
</html>