
<?php
include_once("config.php");
$result = mysqli_query($mysqli,"SELECT * FROM tbl_studien ORDER BY id DESC");
?>


<html>
<body>

<style>
    td{
        justify-content: center;
        text-align: center;

    }
    td a{
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .row{
        display: flex;
        flex-wrap: wrap;
    }
    .container{

        margin: auto;
    }
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"],.result{
        width: 100%;
        box-sizing: border-box;
    }
    /* formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
    .left{
        width: 25%;
    }
    .right{
        width: 75%;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /*get input values on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("backend.php", {term: inputVal}).done(function(data){
                    //display the return data in browser
                    resultDropdown.html(data);
                });
            }else {
                resultDropdown.empty();
            }
        });

        //set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();

        })
    })
</script>

</div>


<div class="">
    <a style="color: black;" href="create.php">Create Studient</a>
    <br>
    <br>

    <table width='95%'; border=1>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Option</th>
        </tr>
        <?php

        while($stu_data =  mysqli_fetch_array($result)){
            echo '<tr>';
            echo '<td>'. $stu_data['name'].'</td>';
            echo '<td>'. $stu_data['age'].'</td>';
            echo '<td>'. $stu_data['address'].'</td>';
            echo '<td>'. $stu_data['telephone'].'</td>';
            echo "<td> <a href='edit.php?id=$stu_data[id]'>Edit</a> |
            <a href='delete.php?id=$stu_data[id]'>Delete</a> </td>";
            echo '</tr>';
        }
        ?>
</div>
</div>

</table>
</body>
</html>