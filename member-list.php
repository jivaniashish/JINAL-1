<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	require_once ('head.php');
	?>
	
	<h1> List of Registered Users </h1>
	
	<?php
	
	
	/*$search=null;
	
	if(!empty($_GET['search']))
	{
		$search=$_GET['search'];
	}
	
	if (!empty($_SESSION['userId'])) {
            echo '<a href="register.php">Add a New Member</a>';
        }
	
	<aside>
		<form method="get" action="member-list.php">
			<fieldset class="form-group">
            	<input name="username" id="username" type="email" placeholder="Please Search username here" 
				?>value=<?php "echo $search;"/>
        	</fieldset>
		</form>
		<button> Search </button>
		</aside>
	*/	
		//connect
    require_once 'db.php';

    //SQL Query to selects data from the users database 
    $query = "SELECT * FROM users";

    /*// checking for the string in in the search bar
    $split = null; 
	// splits the string into letters

    if (!empty($_GET['search']))
	{
        // splits the word by spaces ' '
        $split = preg_match('@gmail.com', $search);
		//splits til the @gmail.com

        //appends the WHERE clause in the selection
        $query .= " WHERE ";
		
		//variable to count the no. of letters in search panel
        $count = 0;

        // iterate through the wordList array and add a condition for each keyword
        foreach($split as $letter)
		{
            //no condition for first letter 
			//condition for other letters after the first
            if ($count> 0 )
			{
                $query .= " OR ";
            }

            //condition for all letters
            $query .= " name LIKE ?";
            $split[$count] = "%" . $letter . "%";
            $count++;
        }
    }

    */// 3. Create a Command variable $cmd then use it to run the SQL Query. Modified in Week 11 to pass wordList array for search
    $cmd = $db->prepare($query);
    $cmd->execute();

    // 4. Use the fetchAll() method of the PDO Command variable to store the data into a variable called $persons.  See  for details.
    $member = $cmd->fetchAll();

/*    $counted = $cmd->rowCount();

    echo "<h5> found Members $counted</h5>";
*/
    // 4a. Create a grid with a header row
    echo '<table class="sortable">
		
			<thead>
					<th>Email id</th>
					<th>NAME</th>
					<th>Nickname</th>
					<th>Phone no.</th>
			</thead>';

    // foreach iterates the data and displays it
    foreach ($member as $value)
	{
        // could use this but it's unclear and error prone: echo $value[1];
       
		echo "<tr>";
                echo"<td>" . $value['username'] . "</td>";
				echo"<td>" . $value['name'] . "</td>";
				echo"<td>" . $value['nickname'] . "</td>";
				echo"<td>" . $value['phoneno'] . "</td>";
            echo "</tr>";
	}
	
	//edit and delete options to authenticated users
	if(!empty($_SESSION['userId']))
	{
		echo'<tr>';
		
		echo'<td> 
		
					<button><a href="edit.php">Edit</a></button>
					<button><a href="delete.php">Delete</a></button>
					
					</td>';
		
		echo '</tr>';
	}
    // table end
    echo '</table>';

    // 6. Disconnect from the database
    $db = null;	
    ?>
</body>
</html>