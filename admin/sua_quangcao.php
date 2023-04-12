<!DOCTYPE html>
<html>
<head>
<title>Sửa Quảng Cáo</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php

// Kết nối Database
require('layouts/header.php'); ?>
<?php
require('./../connect.php'); ?>

<?php
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from `advertisements` where id='$id'");
$row=mysqli_fetch_assoc($query);
?>
<div class="fix_form">
<form method="POST" class="form">
<h2>Sửa quảng cáo</h2>
<label>Tittle: <input type="text" value="<?php echo $row['title']; ?>" name="title"></label><br/>
<label>Ảnh: <input type="text" value="<?php echo $row['image']; ?>" name="image"></label><br/>
<label>Link: <input type="text" value="<?php echo $row['link']; ?>" name="link"></label><br/>
<label>Trạng thái:<select name="status" class="status" value="<?php echo $row['status']; ?>" name="status">
            <option value="ACTIVE">ACTIVE</option>
            <option value="INACTIVE">INACTIVE</option>
         </select></br> 
<div class="funtion">
        <ul>
           <li><input type="submit" name="update_advertisement" value="Update" class="update_advertisement" /></li>
        </ul>   
    </div>
</div>   

<?php require('layouts/footer.php'); ?>
<?php
if (isset($_POST['update_advertisement'])){
$id=$_GET['id'];
$title=$_POST['title'];
$image=$_POST['image'];
$link=$_POST['link'];
$status=$_POST['status'];


// Create connection
$conn = new mysqli("localhost", "root", "", "webtintuc");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `advertisements` SET title='$title', image='$image', link='$link', status='$status' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
echo "Cập nhật thành công";
} else {
echo "Cập nhật thất bại: " . $conn->error;
}

$conn->close();
}
?>
</form>
</div>
</body>
</html>

<style>

.form h2{
    background-color: white;
 }

.fix_form{
    justify-content: center;
    margin-top: 10px;
    margin-bottom: 20px;
    margin-left: 250px;
}

.form{
 width: 900px;
 padding: 20px 20px 5px 20px;
 margin: 0 auto;
 font-weight: 700px;
 background-color: white;
}

.form label{
    background-color: white;
}

.form input{
 width:  900px;
 height: 35px;
 padding: 10px 0;
 margin: 10px 0;
 border-radius: 5px;
 background-color: white;
}

.role{
margin: 7px 27px;
width: 30%;
height: 30px;
border-radius: 5px;
background-color: white;

}

.role option{
background-color: white;    
}

.gender{
margin: 7px 10px;
width: 30%;
height: 30px;
border-radius: 5px;
background-color: white;

}

.status{
margin: 7px 5px;
width: 100px;
height: 30px;
border-radius: 5px;
background-color: white; 
}



.update_advertisement{
 height: 35px;
 padding: 10px 0;
 margin-top: 35px;
 border-radius: 5px;
 width: 150px;
 background-color: #007bff;
 color: #fff;
 border: 1px solid #fff;
 margin-left: 75px;
}

.funtion{
    background-color: white;
    margin-left: 150px;
}

.funtion ul{
    display: flex;
    list-style: none;
    background-color: white;
}

.funtion ul li{
    margin: 0 60px;
    background-color: white;
    
}

.funtion input{
    width: 300px;
    background-color: #003333;
    color: #fff;
    border: 1px solid #fff;
}

</style>
