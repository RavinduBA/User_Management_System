<?php    require_once('include/connection.php');  //connect the connection file  ?>

<?php 

/* UPDATE table_name 
  SET column1= value1 ,column2=value2
  WHERE column_name =value
  LIMIT 1

*/

   $query = "UPDATE user SET first_name='lasantha' WHERE id =3";
 
   $result_set=  mysqli_query($connection,$query);

   // mysqli_affected_rows() = returns no of rows affected 

   if($result_set){
    echo mysqli_affected_rows($connection). "Records updated";
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>