<?php
    ob_start();
    include "connect.php";
    if(isset($_POST['remove'])){

    $id = $_POST['remove'];
    $sql = "DELETE FROM `content` WHERE id = $id";
    mysqli_query($conn, $sql);
    header("location:index.php");
    }
    ob_end_flush();
?>