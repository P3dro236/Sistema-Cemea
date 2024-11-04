<?php 
include_once("config.php");

$idDelete = intval($_POST['id']);  // Assegura que $idDelete é tratado como um número inteiro
$state = filter_var($_POST['state'], FILTER_VALIDATE_BOOLEAN);  // Converte $state para um booleano

if (!$state) {  // Se $state for false
    $insertQuery = "INSERT INTO alunosInativos (id, nome, escola,categoriaEscola, endereco, bairro, data_nasc, telefone, doc, responsavel, numModalidades, priModalidade, priHorario, priProfessor, segModalidade, segHorario, segProfessor, terModalidade, terHorario, terProfessor, quaModalidade, quaHorario, quaProfessor, quiModalidade, quiHorario, quiProfessor, sexModalidade, sexHorario, sexProfessor, dataDeSaida) 
                    SELECT id, nome, escola,categoriaEscola, endereco, bairro, data_nasc, telefone, doc, responsavel, numModalidades, priModalidade, priHorario, priProfessor, segModalidade, segHorario, segProfessor, terModalidade, terHorario, terProfessor, quaModalidade, quaHorario, quaProfessor, quiModalidade, quiHorario, quiProfessor, sexModalidade, sexHorario, sexProfessor, NOW() 
                    FROM alunos 
                    WHERE id = $idDelete";
                    
    $insert = mysqli_query($conexao, $insertQuery);

    if ($insert) {
        $delete = mysqli_query($conexao, "DELETE FROM alunos WHERE id = $idDelete");
        
        if ($delete) {
            echo "Aluno movido para alunosInativos e removido da tabela alunos com sucesso.";
        } else {
            echo "Erro ao excluir o aluno da tabela alunos: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao inserir o aluno na tabela alunosInativos: " . mysqli_error($conexao);
    }
} else {  // Se $state for true
    $sql = "DELETE FROM alunosInativos WHERE id = $idDelete";
    $result = mysqli_query($conexao, $sql);
    
    if ($result) {
        echo "Aluno removido da tabela alunosInativos com sucesso.";
    } else {
        echo "Erro ao excluir o aluno da tabela alunosInativos: " . mysqli_error($conexao);
    }
}
