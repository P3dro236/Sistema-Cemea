<?php  
    include_once("../php/config.php");
    $sql = "SELECT * FROM modalidades ORDER BY modalidade";
    $result = mysqli_query($conexaoModalidades,$sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" content="user-scalable=no">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="../styles/styleAdicionarModalidade.css">
    <link rel="shortcut icon" href="..\images\image__5_-removebg-preview.png">
    <title>Sistema alunos</title>
</head>
<body>
    <main id="main">
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
        <div class="content">
            <div class="addModalidade">
                <h1>Adicionar Modalidade</h1>
                <form action="" id="addModalidade">
                    <input type="text" placeholder="Modalidade" id="inputModalidade">
                    <input type="text" placeholder="Horário" id="inputHorario">
                    <input type="text" placeholder="Professor" id="inputProfessor"> <br>
                    <input type="submit" id="submitButton" value="Adicionar">
                </form>
            </div>
            <div class="modalidades">
            
            <table>
                    <thead>
                        <tr>
                            <th scope="col">Modalidade</th>
                            <th scope="col">Horário</th>
                            <th scope="col">Professor</th>
                            <th scope="col" id="RemoverModalidade">Remover Modalidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$row["modalidade"]."</td>";
                                echo "<td>".$row["horario"]."</td>";
                                echo "<td>".$row["professor"]."</td>";
                                echo '<td><button class="buttonRemoverModalidade" type="button" value="'.$row['ID'].'">Remover modalidade</button></td>';
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="../assets/jquerry/jquerry.js"></script>
    <script src="../js/indexAdd.js"></script>
</body>
</html>
<script>if( window.history.replaceState){window.history.replaceState( null, null, window.location.href );}</script>
