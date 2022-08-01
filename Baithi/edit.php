<?php
include_once("config.php");

if(isset($_POST['update'])){

    $id = $_POST['id'];

    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];

    //update len database
    $result = mysqli_query($mysqli,"UPDATE tbl_studien SET name = '$name',age = '$age',address = '$address' , telephone = '$telephone' WHERE id = $id");

    //Quay ve khi cap nhat xong
    header("Location: index.php");
}
?>
<?php
// lay id tu URL
$id = $_GET['id'];
// fetech du lieu theo id
$result = mysqli_query($mysqli,"SELECT * FROM tbl_studien WHERE id =$id");

while($stu_data = mysqli_fetch_array($result)){
    $name = $stu_data['name'];
    $age = $stu_data['age'];
    $address = $stu_data['address'];
    $telephone = $stu_data['telephone'];
}

?>
<html>
<title> Edit Student</title>
<body>
<a href="index.php" >Home</a>
<br><br>
<form  name="update_studient" method="POST" action="edit.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input  type="text" name="name" value=<?php echo $name ;?>></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age" value=<?php echo $age ;?>></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value=<?php echo $address; ?>></td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td><input type="text" name="telephone" value=<?php echo $telephone; ?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>