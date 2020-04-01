<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
	<?php
$title = 'Login';
require_once ('head.php');
?>
	
<header> 
		<h1>Hi,</h1>
		<p>Nice to see you. </p>
		
</header>
	
<main >
    <h2>Login to your account</h2>
	
	<!--Checks if the inputer is the member/admin -->
	<!--After accessing the data it redirects to valid page where the member is checked if exists-->
    
	
	<form method="post" action="valid.php">
		
        <fieldset class="form-group">
			<!--Asking for username entered during registration-->
            <label for="username" class="col-md-2">Username:</label>
            <input name="username" id="username"  type="email" placeholder="email@email.com" required/>
        </fieldset>
		
		
        <fieldset class="form-group">
			<!--Asking for password entered during registration-->
            <label for="password" class="col-md-2">Password:</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
		
		
		<!--Finally submiting all the data-->
        <div class="offset-md-2">
            <button >Submit</button>
        </div>
		
    </form>
	
	
</main>

<?php
require_once 'foot.php';
?>

</body>
</html>