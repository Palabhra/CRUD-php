<?php
include("_dbcon.php");
?>


<?php
$del_query="DELETE from student_details WHERE id= ".$_GET['idX'];
mysqli_query($conn,$del_query);
echo $del_query ;
header("location:index.php?delete=true");
?>