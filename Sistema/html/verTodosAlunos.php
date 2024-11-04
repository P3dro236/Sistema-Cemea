<?php 
    include_once("../php/config.php");

    $searchNome = $_GET['nome'] ?? '';

    if ($searchNome == '') {
        $sql = "SELECT * FROM alunos ORDER BY id";
        $stmt = $conexao->prepare($sql);
    } else {
        $sql = "SELECT * FROM alunos WHERE nome LIKE ?
                OR id LIKE ?
                OR doc LIKE ?
                OR telefone LIKE ?
                OR responsavel LIKE ?
                ORDER BY id";
        $stmt = $conexao->prepare($sql);

        $searchNome = "%".$searchNome."%";
        $stmt->bind_param("sssss",  $searchNome, $searchNome, $searchNome, $searchNome, $searchNome);

    }

    $stmt->execute();
    $result = $stmt->get_result();

    $linhas = "SELECT COUNT(*) AS total FROM alunos";
    $numLinha = $conexao->query($linhas);
    $row = $numLinha->fetch_assoc();
    $numeroDeLinhas = $row['total'];
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
        <div class="navLinks">
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
                <input type="text" name="searchInput" id="searchInput">
                <button id="search">Procurar</button>
            </div>
            <div class="lista">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Edit.</th>
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
                                echo "<td>" . $user_Data['endereco'] . "</td>";
                                echo "<td>" . $user_Data['bairro'] . "</td>";
                                echo "<td>" . $idade . "</td>";
                                echo "<td>" . $user_Data['telefone'] . "</td>";
                                echo "<td>" . $user_Data['doc'] . "</td>";
                                echo "<td>" . $user_Data['responsavel'] . "</td>";
                                echo "<td><a href='editarAlunos.php?id=" . $user_Data['id'] . "'><button value='" . $user_Data['id'] . "' class='buttonVerModalidade'>Ver</button></a></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="..\js\search.js"></script>
    <script src="..\assets\jquerry\jquerry.js"></script>
    <script src="..\js\functions.js"></script>
</body>
</html>
