<?php
 require_once("dbconnect.php");
if( isset( $_POST['delete_work'] )){
    require_once("dbconnect.php");
$idWork = $_POST["work"];
$result = mysqli_query($mysqli, "DELETE `disc` WHERE `id` = $idWork");
}