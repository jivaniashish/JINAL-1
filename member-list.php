<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1> List of Registered Users </h1>
	
	<?php
	$search=null;
	
	if(!empty($_GET['search']))
	{
		$search=$_GET['search'];
	}
	
	if (!empty($_SESSION['userId'])) {
            echo '<a href="register.php">Add a New Member</a>';
        }
	
		<form method="get" action="member-list.php">
            <input name="search"  placeholder="Please Search here"
                   value="<?php echo $search; ?>" />
            <button>Search</button>
        </form>
			
		//connect
    require_once 'db.php';

    //SQL Query to selects data from the users database 
    $query = "SELECT * FROM users";

    // checking for the string in in the search bar
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

    // 3. Create a Command variable $cmd then use it to run the SQL Query. Modified in Week 11 to pass wordList array for search
    $cmd = $db->prepare($query);
    $cmd->execute($split);

    // 4. Use the fetchAll() method of the PDO Command variable to store the data into a variable called $persons.  See  for details.
    $member = $cmd->fetchAll();

    $counted = $cmd->rowCount();

    echo "<h5> found Members $counted</h5>";

    // 4a. Create a grid with a header row
    echo '<table class="sortable">
		
			<thead>
					<th>USERNAME</th>
					<th>EDIT</th>
					<th>DELETE</th>
			</thead>';

    // foreach iterates the data and displays it
    foreach ($member as $value)
	{
        // could use this but it's unclear and error prone: echo $value[1];
        echo '<tr>';

		//session is still running
        if (!empty($_SESSION['userId'])) {
            echo '<td><a href="artist.php?artistId=' . $value['artistId'] . '">' . $value['name'] . '</a></td>';
        }
        else {
            echo '<td>' . $value['name'] . '</td>';
        }

        echo '<td>' . $value['yearFounded'] . '</td>
            <td>' . '<a href="' . $value['website'] . '" target="_new">' . $value['website'] . '</a></td>';

        if (!empty($value['photo'])) 
		{
            echo '<td><img src="img/artists/' . $value['photo'] . '" alt="Artist Photo" class="thumb" />';
        }
		
        else
		{
            echo '<td></td>';
        }

        // only show delete to authenticated users
        if (!empty($_SESSION['userId'])) {
            echo '<td><a href="delete-artist.php?artistId=' . $value['artistId'] . '" class="btn btn-danger"
                onclick="return confirmDelete();">Delete</a></td>';
        }

        echo '</tr>';
    }

    // 5a. End the HTML table
    echo '</table>';

    // 6. Disconnect from the database
    $db = null;	
    ?>
</body>
</html>