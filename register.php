<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register Page</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
	<?php /*?><?php
$title = 'Register';
require_once ('head.php');
?><?php */?>

	<header> 
		<h1>Hi,</h1>
		<p>Nice to see you. </p>
		
		<aside><p>Please Register!!!!</p></aside>
	</header>
	
<main>
    <h2>User Registration</h2>
	
	<!--Posting/Adding all the data collected to the member page and storing it for future reference-->
    <form method="post" action="member.php">
		
		<!--Asking for unique username-->
        <fieldset class="form-group">
            <label for="username" class="col-md-2">Username:</label>
			<!--Requirement.	Usernames should be validated as properly-formatted email addresses.-->
            <input name="username" id="username" required type="email" placeholder="email@email.com" />
        </fieldset>
		
		
		<!--Creating password with standard password requirements-->
        <fieldset class="form-group">
            <label for="password" class="col-md-2">Password:</label>
            <input type="password" name="password" id="password" required
                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
        </fieldset>
		
		<!--Confirming password with password created with standard password requirements-->
        <fieldset class="form-group">
            <label for="confirm" class="col-md-2">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />
   				<!--special characters, d=digit,lowerand upper alpha no more than 8 char-->
        </fieldset>
		
		<!--Finally submiting all the data-->
        <div class="offset-md-2">
			<button type="submit" value="register">Submit</button>
        </div>
    </form>
</main>

<?php
require_once 'foot.php';
?>


</body>
</html>