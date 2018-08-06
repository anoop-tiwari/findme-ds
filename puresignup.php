<?php
require 'connection.php';
session_start();
$insert_data_preparedstmt =mysqli_prepare($con, "INSERT INTO shops(username,password,lat,lng)VALUES (?,?,?,?) ");

if ( !$insert_data_preparedstmt ) {
  die('mysqli error: '.mysqli_error($con));
}
/* bind parameters for markers */
    mysqli_stmt_bind_param($insert_data_preparedstmt, "ssdd", $_POST["username"],$_POST["password"],$_POST["lat"],$_POST["lng"]);
if ( !mysqli_execute($insert_data_preparedstmt) ) {
  die( 'stmt error: '.mysqli_stmt_error($insert_data_preparedstmt) );
  //redirect to signup page
}
//redirect to analytics page
      $_SESSION["table"]=$_POST["username"];
/* close connection */
mysqli_close($con);
?>