<?php 
session_start();
require_once('include/connection.php'); 
require_once('include/functions.php'); 

//cheking if user  is  logged in 
    if(! isset($_SESSION['user_id'])){
        header('Location: index.php');
    }

$user_list='';

//getting values from users

$query = "SELECT * FROM user WHERE is_delete=0 ORDER BY first_name ";
$users = mysqli_query($connection,$query);

verify_query($users);

	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['first_name']}</td>";
		$user_list .= "<td>{$user['last_name']}</td>";
		$user_list .= "<td>{$user['lastlogin']}</td>";
		$user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>";
		$user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\" 
						onclick=\"return confirm('Are you sure?');\">Delete</a></td>";
		$user_list .= "</tr>";
	}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/users.css">
</head>
<body>
    
<header>
    <div class="appname"> User Managment System</div>
    <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> ! <a href="logout.php">Log Out</a>
    </div>
</header>

<main>
<h1>Users <span><a href="add-user.php">+ Add New</a></span></h1>
<table class= "masterlist">
<tr>
   <th>First Name</th>
   <th>Last Name</th>
   <th>Last Login</th>
   <th>Edit</th>
   <th>Delete</th>
</tr>

<?php echo $user_list; ?>


</table>



</main>

</body>
</html>