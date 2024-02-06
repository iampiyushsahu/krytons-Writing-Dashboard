<?php
include 'database_connect.php';
$id = $_GET['id'];

$sql = "DELETE FROM krytons_content WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
    header("location:view_table.php");
} else{
    echo "not delted";
}
?>