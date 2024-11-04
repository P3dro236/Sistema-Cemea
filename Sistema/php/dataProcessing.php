<?php
include_once("config.php");

$nome = $_POST['nome'] ?? '';
$escola = $_POST['escola'] ?? '';
$categoriaEscola = $_POST['categoriaEscola'] ??'';
$endereco = $_POST['endereco'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$data = $_POST['data'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$doc = $_POST['doc'] ?? '';
$responsavel = $_POST['responsavel'] ?? '';
$priModalidade = $_POST['priModalidade'] ?? '';
$priHorario = $_POST['priHorario'] ?? '';
$priProfessor = $_POST['priProfessor'] ?? '';
$segModalidade = $_POST['segModalidade'] ?? '';
$segHorario = $_POST['segHorario'] ?? '';
$segProfessor = $_POST['segProfessor'] ?? '';
$terModalidade = $_POST['terModalidade'] ?? '';
$terHorario = $_POST['terHorario'] ?? '';
$terProfessor = $_POST['terProfessor'] ?? '';
$quaModalidade = $_POST['quaModalidade'] ?? '';
$quaHorario = $_POST['quaHorario'] ?? '';
$quaProfessor = $_POST['quaProfessor'] ?? '';
$quiModalidade = $_POST['quiModalidade'] ?? '';
$quiHorario = $_POST['quiHorario'] ?? '';
$quiProfessor = $_POST['quiProfessor'] ?? '';
$sexModalidade = $_POST['sexModalidade'] ?? '';
$sexHorario = $_POST['sexHorario'] ?? '';
$sexProfessor = $_POST['sexProfessor'] ?? '';
$numModalidade = $_POST['numModalidade'] ??'';

switch($numModalidade){
    case 1:$forms = mysqli_query($conexao, "INSERT INTO alunos(nome,escola,categoriaEscola,endereco,bairro,data_nasc,telefone,doc,responsavel,priModalidade,priHorario,priProfessor,numModalidades, dataInsercao)VALUES('$nome','$escola','$categoriaEscola','$endereco','$bairro','$data','$telefone','$doc','$responsavel','$priModalidade','$priHorario','$priProfessor','$numModalidade', NOW());");break;
    case 2:$forms = mysqli_query($conexao, "INSERT INTO alunos(nome,escola,categoriaEscola,endereco,bairro,data_nasc,telefone,doc,responsavel,priModalidade,priHorario,priProfessor,segModalidade,segHorario,segProfessor,numModalidades, dataInsercao)VALUES('$nome','$escola','$categoriaEscola','$endereco','$bairro','$data','$telefone','$doc','$responsavel','$priModalidade','$priHorario','$priProfessor','$segModalidade','$segHorario','$segProfessor','$numModalidade', NOW());");break;
    case 3:$forms = mysqli_query($conexao, "INSERT INTO alunos(nome,escola,categoriaEscola,endereco,bairro,data_nasc,telefone,doc,responsavel,priModalidade,priHorario,priProfessor,segModalidade,segHorario,segProfessor,terModalidade,terHorario,terProfessor,numModalidades, dataInsercao)VALUES('$nome','$escola','$categoriaEscola','$endereco','$bairro','$data','$telefone','$doc','$responsavel','$priModalidade','$priHorario','$priProfessor','$segModalidade','$segHorario','$segProfessor','$terModalidade','$terHorario','$terProfessor','$numModalidade', NOW());");break;
    case 4:$forms = mysqli_query($conexao, "INSERT INTO alunos(nome,escola,categoriaEscola,endereco,bairro,data_nasc,telefone,doc,responsavel,priModalidade,priHorario,priProfessor,segModalidade,segHorario,segProfessor,terModalidade,terHorario,terProfessor,quaModalidade,quaHorario,quaProfessor,numModalidades, dataInsercao)VALUES('$nome','$escola','$categoriaEscola','$endereco','$bairro','$data','$telefone','$doc','$responsavel','$priModalidade','$priHorario','$priProfessor','$segModalidade','$segHorario','$segProfessor','$terModalidade','$terHorario','$terProfessor','$quaModalidade','$quaHorario','$quaProfessor','$numModalidade', NOW());");break;
    case 5:$forms = mysqli_query($conexao, "INSERT INTO alunos(nome,escola,categoriaEscola,endereco,bairro,data_nasc,telefone,doc,responsavel,priModalidade,priHorario,priProfessor,segModalidade,segHorario,segProfessor,terModalidade,terHorario,terProfessor,quaModalidade,quaHorario,quaProfessor,quiModalidade,quiHorario,quiProfessor,numModalidades, dataInsercao)VALUES('$nome','$escola','$categoriaEscola','$endereco','$bairro','$data','$telefone','$doc','$responsavel','$priModalidade','$priHorario','$priProfessor','$segModalidade','$segHorario','$segProfessor','$terModalidade','$terHorario','$terProfessor','$quaModalidade','$quaHorario','$quaProfessor','$quiModalidade','$quiHorario','$quiProfessor','$numModalidade', NOW());");break;
    case 6:$forms = mysqli_query($conexao, "INSERT INTO alunos(nome,escola,categoriaEscola,endereco,bairro,data_nasc,telefone,doc,responsavel,priModalidade,priHorario,priProfessor,segModalidade,segHorario,segProfessor,terModalidade,terHorario,terProfessor,quaModalidade,quaHorario,quaProfessor,quiModalidade,quiHorario,quiProfessor,sexModalidade,sexHorario,sexProfessor,numModalidades, dataInsercao)VALUES('$nome','$escola','$categoriaEscola','$endereco','$bairro','$data','$telefone','$doc','$responsavel','$priModalidade','$priHorario','$priProfessor','$segModalidade','$segHorario','$segProfessor','$terModalidade','$terHorario','$terProfessor','$quaModalidade','$quaHorario','$quaProfessor','$quiModalidade','$quiHorario','$quiProfessor','$sexModalidade','$sexHorario','$sexProfessor','$numModalidade', NOW());");break;
}
$forms = null;
