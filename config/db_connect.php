<?php

//connect to database
$conn = mysqli_connect('localhost','shreya','Shreya@123','ninjas');

//check the connection
if(!$conn){
  echo 'connection error' . mysqli_connect_error();
}

 ?>
