<?php
include_once("config.php");
$modalidade = $_POST['modalidade'];
$horario = $_POST['horario'];
$professor = $_POST['professor'];

$sql = "INSERT INTO modalidades (modalidade, horario, professor) VALUES ('$modalidade','$horario','$professor')";

$result = mysqli_query($conexaoModalidades, $sql);