<?php
include_once("config.php");
$id = $_GET['id'] ?? '';
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
$id = $_POST['id'];
switch($numModalidade){

    case 1:$forms = mysqli_query($conexao, "UPDATE alunos SET nome='$nome', escola='$escola',categoriaEscola='$categoriaEscola', endereco='$endereco', bairro='$bairro', data_nasc='$data', telefone='$telefone', doc='$doc', responsavel='$responsavel', priModalidade='$priModalidade', priHorario ='$priHorario', priProfessor='$priProfessor', segModalidade='', segHorario='', segProfessor='', terModalidade='', terHorario='', terProfessor='', quaModalidade='', quaHorario='', quaProfessor='', quiModalidade='', quiHorario='', quiProfessor='', sexModalidade='', sexHorario='', sexProfessor='' , numModalidades='$numModalidade'WHERE id='$id'"); break;
    case 2:$forms = mysqli_query($conexao, "UPDATE alunos SET nome='$nome', escola='$escola',categoriaEscola='$categoriaEscola', endereco='$endereco', bairro='$bairro', data_nasc='$data', telefone='$telefone', doc='$doc', responsavel='$responsavel', priModalidade='$priModalidade', priHorario ='$priHorario', priProfessor='$priProfessor', segModalidade='$segModalidade', segHorario='$segHorario', segProfessor='$segProfessor', terModalidade='', terHorario='', terProfessor='', quaModalidade='', quaHorario='', quaProfessor='', quiModalidade='', quiHorario='', quiProfessor='', sexModalidade='', sexHorario='', sexProfessor='' , numModalidades='$numModalidade'WHERE id='$id'"); break;
    case 3:$forms = mysqli_query($conexao, "UPDATE alunos SET nome='$nome', escola='$escola',categoriaEscola='$categoriaEscola', endereco='$endereco', bairro='$bairro', data_nasc='$data', telefone='$telefone', doc='$doc', responsavel='$responsavel', priModalidade='$priModalidade', priHorario ='$priHorario', priProfessor='$priProfessor', segModalidade='$segModalidade', segHorario='$segHorario', segProfessor='$segProfessor', terModalidade='$terModalidade', terHorario='$terHorario', terProfessor='$terProfessor', quaModalidade='', quaHorario='', quaProfessor='', quiModalidade='', quiHorario='', quiProfessor='', sexModalidade='', sexHorario='', sexProfessor='' , numModalidades='$numModalidade'WHERE id='$id'"); break;
    case 4:$forms = mysqli_query($conexao, "UPDATE alunos SET nome='$nome', escola='$escola',categoriaEscola='$categoriaEscola', endereco='$endereco', bairro='$bairro', data_nasc='$data', telefone='$telefone', doc='$doc', responsavel='$responsavel', priModalidade='$priModalidade', priHorario ='$priHorario', priProfessor='$priProfessor', segModalidade='$segModalidade', segHorario='$segHorario', segProfessor='$segProfessor', terModalidade='$terModalidade', terHorario='$terHorario', terProfessor='$terProfessor', quaModalidade='$quaModalidade', quaHorario='$quaHorario', quaProfessor='$quaProfessor', quiModalidade='', quiHorario='', quiProfessor='', sexModalidade='', sexHorario='', sexProfessor='' , numModalidades='$numModalidade'WHERE id='$id'"); break;
    case 5:$forms = mysqli_query($conexao, "UPDATE alunos SET nome='$nome', escola='$escola',categoriaEscola='$categoriaEscola', endereco='$endereco', bairro='$bairro', data_nasc='$data', telefone='$telefone', doc='$doc', responsavel='$responsavel', priModalidade='$priModalidade', priHorario ='$priHorario', priProfessor='$priProfessor', segModalidade='$segModalidade', segHorario='$segHorario', segProfessor='$segProfessor', terModalidade='$terModalidade', terHorario='$terHorario', terProfessor='$terProfessor', quaModalidade='$quaModalidade', quaHorario='$quaHorario', quaProfessor='$quaProfessor', quiModalidade='$quiModalidade', quiHorario='$quiHorario', quiProfessor='$quiProfessor', sexModalidade='', sexHorario='', sexProfessor='' , numModalidades='$numModalidade'WHERE id='$id'"); break;
    case 6:$forms = mysqli_query($conexao, "UPDATE alunos SET nome='$nome', escola='$escola',categoriaEscola='$categoriaEscola', endereco='$endereco', bairro='$bairro', data_nasc='$data', telefone='$telefone', doc='$doc', responsavel='$responsavel', priModalidade='$priModalidade', priHorario ='$priHorario', priProfessor='$priProfessor', segModalidade='$segModalidade', segHorario='$segHorario', segProfessor='$segProfessor', terModalidade='$terModalidade', terHorario='$terHorario', terProfessor='$terProfessor', quaModalidade='$quaModalidade', quaHorario='$quaHorario', quaProfessor='$quaProfessor', quiModalidade='$quiModalidade', quiHorario='$quiHorario', quiProfessor='$quiProfessor', sexModalidade='$sexModalidade', sexHorario='$sexHorario', sexProfessor='$sexProfessor' , numModalidades='$numModalidade'WHERE id='$id'"); break;
  }
$forms = null;