<?php    require_once('include/connection.php'); ?>


<?php 

     $query = "SELECT * FROM user ";

     $result_set=  mysqli_query($connection,$query);

      if($result_set){
        //checking how many records returned from the query
        echo mysqli_num_rows($result_set) ." Records found.<hr>";


       $table ='<table>';
       $table.= '<tr><th>First Name</th><th>Last Name</th><th>email</th><th>id</th></tr>';
        

        // this function use to set data on record 1 to asscoctive array
       // mysqli_fetch_assoc()
        
       // loop goes until false value
       while($record= mysqli_fetch_assoc($result_set)){
        $table .= '<tr>';
        $table .= '<td>'. $record['first_name'].'</td>';
        $table .= '<td>'. $record['last_name'].'</td>';
        $table .= '<td>'. $record['email'].'</td>';
        $table .= '<td>'. $record['id'].'</td>';
        }
        
         $table.= '</table>';
      }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Query</title>
    <style>
        table {border-collapse: collapse}
        td,th{border: 1px solid black;padding: 10px}
    </style>
</head>
<body>
    <?php echo $table ?>
</body>
</html>




<?php   mysqli_close($connection)  ;  ?>