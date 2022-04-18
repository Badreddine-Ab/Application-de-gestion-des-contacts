<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Badr@2001";
$db = "ooplogin";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if(isset($_GET['delete'])){
    echo'delete';
$id = $_GET['delete'];
$sql = "DELETE FROM contact WHERE id_cont= $id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}



header('location:contact.pages.php');
}else{
    echo 'nothing';
}