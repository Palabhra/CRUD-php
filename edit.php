<?php
include("_dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: rgb(255, 255, 255);
            height: 600px;
            width: 900px;
        }
        
        div {
            height: 600px;
            width: 900px;
            position: relative;
            left: 55px;
            background-image: linear-gradient( rgb(191, 218, 204), rgb(174, 205, 240));
        }
        
        #header {
            position: relative;
            top: 45px;
            left: 321px;
            font-style: oblique;
        }
        
        #font {
            position: relative;
            top: 75px;
            left: 300px;
            font-size: x-large;
            font-weight: 900;
        }
        
        #i_field {
            height: 27px;
            width: 300px;
            padding-left: 20px;
            border-width: 0px;
            border-style: solid;
            position: relative;
            top: 2px;
            border-radius: 9px;
            box-shadow: 0 0 15px 4px rgba(22, 21, 21, 0.06);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        
        #button {
            height: 32px;
            width: 140px;
            background-color: rgba(19, 82, 218, 0.856);
            font-weight: 900;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: rgb(255, 255, 255);
            border-radius: 10px;
            border-width: 0px;
            position: relative;
            top: 85px;
            left: 390px;
            cursor: grab;
            box-shadow: 0 0 56px 1px rgb(128, 94, 109);
        }
        
        #table {
            height: 120px;
            width: 800px;
            border: 1px;
            border-spacing: 2px;
            border-style: solid;
            position: absolute;
            top: 450px;
            left: 50px;
            border-collapse: collapse;
            font-family: apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        tr:nth-child(even) {
            background-color: rgb(248, 250, 114);
        }
        
        tr:nth-child(odd) {
            background-color: rgb(211, 172, 147);
        }
    </style>
</head>

<body id="grad">
    <?php
$fetch_query= "SELECT * from student_details WHERE id= ".$_GET['idY'];
$var=mysqli_query($conn,$fetch_query);$data=mysqli_fetch_assoc($var);
    ?>
    <div>
        <h1 id="header"> <u>Edit Your Information</u></h1>
        <form action="" method="post">
            <label for="" id="font">NAME<br> <input value="<?php echo $data['Name'];  ?>"  type="text" required name="n_field" id="i_field" placeholder="Enter your name"></label><br><br>
            <label for="" id="font">Course<br> <input value="<?php echo $data['Course'];  ?>" type="text" required name="c_field" id="i_field" placeholder="Enter your Course"></label><br><br>
            <label for="" id="font">Subject<br> <input value="<?php echo $data['Subject'];  ?>"  type="text" required name="s_field" id="i_field" placeholder="Enter your Subject"></label><br><br>
            <input type="submit" name="btn" value="Update" id="button">
        </form>
        

    </div>
</body>

</html>

<?php

if (isset($_REQUEST['btn'])) {
  $NAME=$_REQUEST['n_field'];
  $COURSE=$_REQUEST['c_field'];
  $SUBJECT=$_REQUEST['s_field'];
  $sql_quarry="update student_details set Name='$NAME',Course='$COURSE',Subject='$SUBJECT' where id=".$_GET['idY'];
 
$check=mysqli_query($conn,  $sql_quarry);
//text to argument 1. db connection 2. sql query

header("location:index.php");

}

?>

<?php
if (isset($_REQUEST['del'])) {
    $NAME=$_REQUEST['n_field'];
    $COURSE=$_REQUEST['c_field'];
    $SUBJECT=$_REQUEST['s_field'];
    $sql_quarry="DELETE from `student_details` WHERE Name =$NAME";
    $check=mysqli_query($conn,  $sql_quarry);
}
?>