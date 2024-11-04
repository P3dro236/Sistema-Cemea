<?php 
    include_once("../php/config.php");

    $searchNome = $_GET['nome'] ?? '';

    // Consulta para buscar "futsal" em qualquer coluna de modalidade
    if ($searchNome == '') {
        $sql = "SELECT * FROM alunos ORDER BY id";
        $stmt = $conexao->prepare($sql);
    } else {
        $sql = "SELECT * FROM alunos 
                WHERE priModalidade LIKE ? 
                   OR segModalidade LIKE ? 
                   OR terModalidade LIKE ? 
                   OR quaModalidade LIKE ? 
                   OR quiModalidade LIKE ? 
                   OR sexModalidade LIKE ? 
                   OR nome LIKE ?
                ORDER BY id";
        $stmt = $conexao->prepare($sql);

        $searchNome = "%".$searchNome."%";
        $stmt->bind_param("sssssss", $searchNome, $searchNome, $searchNome, $searchNome, $searchNome, $searchNome, $searchNome);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylesTodosAlunos.css">
    <link rel="shortcut icon" href="../images/image__5_-removebg-preview.png">
    <title>Sistema alunos</title>
</head>
<body>
    <nav id="nav">
        <div class="navLinks" >
            <a href="index.php">Adicionar alunos</a> <br> <br>
            <a href="modalidades.php">Ver modalidades</a> <br> <br>
            <a target=_blank href="https://docs.google.com/spreadsheets/d/1cKQjjkLwsJrDvW85MoCF17WvkpreDO3oGGGNG9YeHCs/edit?gid=0#gid=0">Diario de alunos</a> <br> <br>
            <a href="verTodosAlunos.php">Ver todos os alunos</a> <br> <br>
            <a href="alunosInativos.php">Alunos inativos</a> <br> <br>
            <a href="adicionarModalidade.php">Adicionar modalidade</a> <br>
        </div>
    </nav>
    <main id="main">
        <div class="content">
            <div class="search">
                <span>Pesquisar aluno:</span> 
                <input type="text" name="searchInput" id="searchInputModalidade">
                <button id="searchModalidade">Procurar</button>
            </div>
            <div class="lista">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" onclick='alert("oi")'>Nome</th>
                            <th scope="col">1º Modalidade</th>
                            <th scope="col">2º Modalidade</th>
                            <th scope="col">3º Modalidade</th>
                            <th scope="col">Ver mais</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while ($user_Data = mysqli_fetch_assoc($result)) {
                                $data_nasc_obj = new DateTime($user_Data["data_nasc"]);
                                $data_atual_obj = new DateTime();
                                $idade = $data_nasc_obj->diff($data_atual_obj)->y;

                                echo "<tr>";
                                echo "<td id='nomeTable'>" . $user_Data['nome'] . "</td>";
                                echo "<td>".$user_Data['priModalidade'].' | '.$user_Data['priHorario'].' | '.$user_Data['priProfessor']."</td>";
                                if($user_Data['segModalidade'] != ""){
                                    echo "<td>".$user_Data['segModalidade'].' | '.$user_Data['segHorario'].' | '.$user_Data['segProfessor']."</td>";
                                } else{
                                    echo "<td></td>";
                                }
                                if($user_Data['terModalidade'] != ""){
                                    echo "<td>".$user_Data['terModalidade'].' | '.$user_Data['terHorario'].' | '.$user_Data['terProfessor']."</td>";
                                } else{
                                    echo "<td></td>";
                                }
                                echo '<td 
                                        onclick="idCatch(
                                            ' .'\'' . $user_Data['quaModalidade'] . '\',
                                            ' .'\'' . $user_Data['quaHorario'] . '\',
                                            ' .'\'' . $user_Data['quaProfessor'] . '\',
                                            ' .'\'' . $user_Data['quiModalidade'] . '\',
                                            ' .'\'' . $user_Data['quiHorario'] . '\',
                                            ' .'\'' . $user_Data['quiProfessor'] . '\',
                                            ' .'\'' . $user_Data['sexModalidade'] . '\',
                                            ' .'\'' . $user_Data['sexHorario'] . '\',
                                            ' .'\'' . $user_Data['sexProfessor'] . '\'' .')">'.
                                        "<button class='buttonTodasModalidades'>Ver</button>" 
                                    ."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="..\assets\jquerry\jquerry.js"></script>
    <script src="..\js\search.js"></script>
    <script src="..\js\functions.js"></script>
</body>
</html>
