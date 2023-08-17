<?php
require "./Db/Db_Members.php";

$id = $_GET['id'];
$deleteSQL = "DELETE FROM members where id = '$id'";
$deletequery = mysqli_query($con, $deleteSQL);
if(isset($deletequery))
{
    echo "<script>window.location.href='Display.php'</script>";
}
else {
    echo "<h1>Error!</h1>";
}
?>