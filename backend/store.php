<?php
require 'connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");



if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
  
	
	
  // Sanitize.
$firstName=mysqli_real_escape_string($con,trim($request->data->firstName));
$lastName=mysqli_real_escape_string($con,trim($request->data->lastName));
$email=mysqli_real_escape_string($con,trim($request->data->email));
$password=mysqli_real_escape_string($con,trim($request->data->password));
    

  // Store.
 $sql = "INSERT INTO `idproject`(`firstName`,`lastName`,`email`, `password`) VALUES ('{$firstName}','{$lastName}','{$email}','{$password}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
  }
  else
  {
    http_response_code(422);
  }
}
