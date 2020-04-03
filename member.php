<!--http is stateless protocol-->
<?php


$title = 'member';
require_once ('head.php');

//get form input
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];

//validate inputs: required+matching passwords
if (empty($username)){
    echo 'Username is required<br />';
    $ok = false;
}

if (empty($password)) {
    echo 'Password is required<br />';
    $ok = false;
}

if ($password != $confirm){
    echo 'Passwords do not match, Please check!! ';
    $ok = false;
}

if ($ok) {
	
	// hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //echo $password;

   /* try {*/
			//connect
			require_once 'db.php';

//check if username exists
	$sql="SELECT*FROM users WHERE username=:username";
	$cmd=$db->prepare($sql);
	$cmd->bindParam(':username',$username,PDO::PARAM_STR,50);
    $cmd->execute();
	$user=$cmd->fetch();
	
	//if user exists 
		if (!empty($user))
		{
            echo 'Username already exists<br />';
        }

		else {
            // set up & run insert
            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
            $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
			$cmd->execute();
        }



//disconnect and redirect
$db = null;

// redirect to login page
 //       header('location:login.php');
// }

/*catch (Exception $e) {
        header('location:error.php');
        exit();
    }
}*/

require_once 'foot.php';
?>