<?php 
include_once("config.php");


$id = $_POST['id'];
$insertQuery = "INSERT INTO alunos (id, nome, escola, endereco, bairro, data_nasc, telefone, doc, responsavel, priModalidade, priHorario, priProfessor, segModalidade, segHorario, segProfessor, terModalidade, terHorario, terProfessor, quaModalidade, quaHorario, quaProfessor, quiModalidade, quiHorario, quiProfessor, sexModalidade, sexHorario, sexProfessor,numModalidades, dataInsercao) 
                SELECT id, nome, escola, endereco, bairro, data_nasc, telefone, doc, responsavel, priModalidade, priHorario, priProfessor, segModalidade, segHorario, segProfessor, terModalidade, terHorario, terProfessor, quaModalidade, quaHorario, quaProfessor, quiModalidade, quiHorario, quiProfessor, sexModalidade, sexHorario, sexProfessor,numModalidades, NOW() 
                FROM alunosInativos WHERE id = $id";
$insert = mysqli_query($conexao, $insertQuery);




$delete = mysqli_query($conexao, "DELETE FROM alunosInativos WHERE id=$id");
