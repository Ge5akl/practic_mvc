<?php
header('Location: index.php');
require_once("dbconnect.php");
if( isset($_POST['edit_work'] )){
$idWork = $_POST["work"];
$result = mysqli_query($mysqli, "UPDATE `disc` set `status` = 'notActive' WHERE `id` = $idWork");
}
if( isset($_POST['delete_work'] )){
$idWork = $_POST["work"];
$result = mysqli_query($mysqli, "DELETE FROM `disc` WHERE `id` = $idWork");
}