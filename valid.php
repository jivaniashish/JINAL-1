
<?php
	
	//save inputs
$username = $_POST['username'];
$password = $_POST['password'];

	
	/*using try and catch method*/
try {
	//connect
    require_once 'db.php';
	
	//check if username exists
    $sql = "SELECT userId, password FROM users WHERE username = :username";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();

    if (!password_verify($password, $user['password']))
	{
        header('location:login.php?invalid=true');
        echo 'Invalid Login' ;
        exit();
    } 
	
	else 
	{
                session_start();
		/* continues with the existing session */
		/*checks or adds data to session object*/
		
			/*session variable userId which contains data from the query*/
			$_SESSION['userId'] = $user['userId'];

			/* another session variable to be displayed in navbar*/
			$_SESSION['username'] = $username;

			// redirect to home page of the admin
			header('location:home.php');
    }
	
//disconnect and redirect
    $db = null;
}
	
	
	/*if any error occurs during the try process it directs to the catch **/
	
catch (Exception $e) {
	/*where catch shows the error and directs to exit*/
    header('location:error.php');
    exit();
}
?>
