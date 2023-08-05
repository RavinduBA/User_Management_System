<?php

 function verify_query($result_set){

 global $connection;

 if(! $result_set){
    die("Databse query failed" . mysqli_error($connection));
 }

 }

?>