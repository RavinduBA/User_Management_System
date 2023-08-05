<?php    require_once('include/connection.php');  //connect the connection file  ?>

<?php 

/* DELETE FROM table_name 
  WHERE column_name =value
  LIMIT 1

*/

   $query = "DELETE FROM user WHERE id=3 LIMIT 1";
 
   $result_set=  mysqli_query($connection,$query);

   // mysqli_affected_rows() = returns no of rows affected 

   if($result_set){
    echo mysqli_affected_rows($connection). "Records Deleted";
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE Query</title>
</head>
<body>
    
</body>
</html>