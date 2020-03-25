
The log-out page

<?php

/*the running session is accessed*/
session_start();

/*the session of a particular member is checked*/
unset($_SESSION['username']);

/*session is destroyed*/
session_destroy();

/*redirects to login page*/
header("Location: login.php");
exit;
?>