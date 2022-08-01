<?php
//kiem tra from co submit (add)
if(isset($_POST['Submit'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $telephone = $_POST['telephone'];

    //load conection
    include_once("config.php");

    //them ban ghi moi
    $result = mysqli_query($mysqli,"INSERT INTO tbl_studien (name,age,address,telephone)
        VALUES('$name','$age','$address','$telephone')");
    //hien thi khi cap nhat xong
    echo "User added successfully";
}
?>

<html>
<head><title> Add student</title></head>

<body>
<a href="index.php" >Go To Home</a>
<br><br>
<form  name="form" method="POST" action="create.php">
    <table width="25%" border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" ></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age" ></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>

        <tr>
            <td>Telephone</td>
            <td><input type="text" name="telephone"></td>
        </tr>
        <tr>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>
</body>
</html>