<?php 
include_once("config.php");
$idDelete = $_POST['id'];

$delete = mysqli_query($conexaoModalidades, "DELETE FROM modalidades WHERE id=$idDelete");