<?php
require('./../connect.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
$id=$_GET['id'];
$sql = "DELETE FROM comments  WHERE id='$id'";
header("location: ds_binhluan.php");
if ($conn->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>