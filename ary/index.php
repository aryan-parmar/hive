<?php
//specify the server name and here it is localhost
$server_name = "localhost";

//specify the username - here it is root
$user_name = "root";

//specify the password - it is empty
$password = "";

// Creating the connection by specifying the connection details
$connection = mysqli_connect($server_name, $user_name, $password);

// Checking the  connection
if (!$connection) {
  die("Failed ". mysqli_connect_error());
}
echo "Connection established successfully." . "\n";

//sql query to create a database named mycompany
$query = "CREATE DATABASE mycomp2";
if (mysqli_query($connection, $query)) {
  echo "A new database called mycomp is successfully created!";
} else {
  echo "Error:" . mysqli_error($connection);
}

$database_name = "mycomp2";

// Creating the connection by specifying the connection details
$connection = mysqli_connect($server_name, $user_name, $password,$database_name);

//sql query to create a table named Service with three columns
$query = "CREATE TABLE  Service(
   id int,
   name varchar(244),
   count int
   )";
   if (mysqli_query($connection, $query)) {
     echo "Table is successfully created in mycomp database.";
   } else {
     echo "Error:" . mysqli_error($connection);
    }
    

mysqli_close($connection);
?>