<?php 
session_start();
require_once('include/connection.php');  //connect the connection file  
require_once('include/functions.php'); ?>

<?php

//check for form submiision
   if(isset($_POST['submit'])){

    $errors= array();

// check if the username & password entered
    if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ){
        $errors[]= 'Username is missing / invalid';
    }

    if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ){
        $errors[]= 'Password is missing / invalid';
    }

// check if there are any errors

   if(empty($errors)){

// save username & password into varibales
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = sha1($password);

// prepare database query
  
  $query = "SELECT * FROM user 
            WHERE email =  '{$email}'
            AND password = '{$hashed_password}'
            LIMIT 1 ";
    
  $result_set=  mysqli_query($connection,$query);

  verify_query($result_set);
    //query succesfull

         if(mysqli_num_rows($result_set) == 1){
             //valid user found

           $user = mysqli_fetch_assoc($result_set);
           $_SESSION['user_id'] = $user['id'];
           $_SESSION['first_name'] = $user['first_name'];
           
           // updating last login
				$query = "UPDATE user SET lastlogin = NOW() ";
				$query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

                $result_set = mysqli_query($connection, $query);

				
                verify_query($result_set);
			

             //redirect to users.php
             header('Location: users.php');
    
            }else{
                $errors[] = 'Invalid Username /Password';
               }
               
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In user managment System</title>
     <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<div class="login">

<form action="index.php" method= "POST">

<fieldset>
      <legend> <h1>Log In</h1></legend>

  <?php   
      if (isset($errors) &&  !empty($errors)){                   //isset($errors): The isset() function checks if the variable $errors is set, meaning it has been defined and has a value.
                                                                 // !empty($errors): The !empty() function checks if the variable $errors is not empty, meaning it has a value that is not considered empty according to PHP.
    echo '<p class="error">Invalid Username / Password </p> ';
      } 
     
?>

      <p>  
      <label for="">Username :</label>
      <input type="text" name="email" id="" placeholder="Email Address">
      </p>
      <p>
      <label for="">Password :</label>
      <input type="password" name="password" id="" placeholder="Password">
      </p>
       <p>
        <button type ="submit" name ="submit"> Log In </button>
      </p>

</fieldset>
</form>
</div>



</body>
</html>

<?php   mysqli_close($connection)  ;       //closing the connection ?>