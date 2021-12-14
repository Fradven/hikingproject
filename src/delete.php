<?php 
require_once('./includes/dbh.inc.php');
  
try{
$id = $_GET ["id"];
$stmt = $conn->prepare("DELETE FROM hikes WHERE id='$id'");
$stmt->execute();
header("location:index.php");
} catch(PDOException $e) {
echo "connection Failed!";
exit;}
?>
