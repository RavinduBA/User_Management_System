<?php    require_once('include/connection.php'); ?>

<?php


/*INSERT INTO `user`(`id`, `first_name`, `last_name`, `email`, `password`, 
`lastlogin`, `is_delete`)
 VALUES ('[value-1]','[value-2]','[value-3]','[value-4]',
 '[value-5]','[value-6]','[value-7]')

*/
  $first_name = 'bagya';
  $last_name = 'wijesinghe';
  $email      = 'abc11@gmail.com';
  $password   = 'mypassword';
  $is_delete  = 0;

  $hashed_password = sha1($password);  // encrypting password

  $query = "INSERT INTO user( `first_name`, `last_name`, `email`, `password`, 
            `is_delete`)
            VALUES ('{$first_name}','{$last_name}','{$email}','{$hashed_password}',
           '{$is_delete}')";

   mysqli_query($connection,$query);    /*mysqli_query() function is a PHP function used to execute a MySQL database query in the 
                                          context of a MySQLi database connection.
                                         When you call the mysqli_query($connection, $query) function, PHP sends the specified SQL 
                                         query to the MySQL database connected via the $connection object.
                                         For INSERT, UPDATE, DELETE, and other non-SELECT queries: The function returns a Boolean 
                                         value (true or false) to indicate whether the query was executed successfully or not.
                                         */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert Query</title>
</head>
<body>
    
</body>
</html>



