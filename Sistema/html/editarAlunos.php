<?php 
    include_once("../php/config.php");

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM alunos WHERE id=$id";
    $sqlSelectInativo = "SELECT * FROM alunosInativos WHERE id=$id";
    
    $resultSelect = $conexao -> query($sqlSelect);
    if($resultSelect->num_rows == 0){
        $resultSelect = $conexao -> query($sqlSelectInativo);
        $state = true;
        
    }else{
        $state = false;
    }

    if($resultSelect->num_rows > 0){
        while($user_Data = mysqli_fetch_assoc($resultSelect)){
            $nome = $user_Data['nome'] ?? '';
            $escola = $user_Data['escola'] ?? '';
            $categoriaEscola = $user_Data['categoriaEscola'] ??'';
            $endereco = $user_Data['endereco'] ?? '';
            $bairro = $user_Data['bairro'] ?? '';
            $data = $user_Data['data_nasc'] ?? '';
            $telefone = $user_Data['telefone'] ?? '';
            $doc = $user_Data['doc'] ?? '';
            $responsavel = $user_Data['responsavel'] ?? '';
            $numModalidade = $user_Data['numModalidades'] ??'';
            $infoAluno = [
                'priModalidade' =>[
                    'modalidade' => $user_Data['priModalidade'],
                    'horario' => $user_Data['priHorario'],
                    'professor' => $user_Data['priProfessor']
                ],
                'segModalidade' =>[
                    'modalidade' => $user_Data['segModalidade'],
                    'horario' => $user_Data['segHorario'],
                    'professor' => $user_Data['segProfessor']
                ],
                'terModalidade' =>[
                    'modalidade' => $user_Data['terModalidade'],
                    'horario' => $user_Data['terHorario'],
                    'professor' => $user_Data['terProfessor']
                ],
                'quaModalidade' =>[
                    'modalidade' => $user_Data['quaModalidade'],
                    'horario' => $user_Data['quaHorario'],
                    'professor' => $user_Data['quaProfessor']
                ],
                'quiModalidade' =>[
                    'modalidade' => $user_Data['quiModalidade'],
                    'horario' => $user_Data['quiHorario'],
                    'professor' => $user_Data['quiProfessor']
                ],
                'sexModalidade' =>[
                    'modalidade' => $user_Data['sexModalidade'],
                    'horario' => $user_Data['sexHorario'],
                    'professor' => $user_Data['sexProfessor']
                ]
            ];
        }
    }
    
    $sql = "SELECT * FROM modalidades ORDER BY modalidade";
    $result = mysqli_query($conexaoModalidades,$sql);

    $options = [];
    while ($row = mysqli_fetch_assoc($result)) {
    $options[] = $row;
    }
 
    $sql = "SELECT DISTINCT modalidade, horario, professor FROM modalidades";
    $result = $conexaoModalidades->query($sql);
    
    $dados = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $modalidade = $row['modalidade'];
            $horario = $row['horario'];
            $professor = $row['professor'];
    
            if (!isset($dados[$modalidade])) {
                $dados[$modalidade] = [];
            }
            if (!isset($dados[$modalidade][$horario])) {
                $dados[$modalidade][$horario] = [];
            }
            $dados[$modalidade][$horario][] = $professor;
        }
    }

    $sqlModalidade = "SELECT DISTINCT modalidade FROM modalidades";
    $resultModalidade = $conexaoModalidades->query($sqlModalidade);
    
    $modalidades = [];
    
    if ($resultModalidade->num_rows > 0) {
        while ($row = $resultModalidade->fetch_assoc()) {
            $modalidades[] = $row['modalidade'];
            if($modalidades === ""){
                $modalidades[] = "Não há modalidades";
            }
        }
    } else {
        $modalidades[] = "Não há modalidades";
    }
    $conexao -> close();
    $conexaoModalidades->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" content="user-scalable=no">
    <meta name="viewport" content="user-scalable=no">
    <link rel="stylesheet" href="../styles/styleEditarAluno.css">
    <title>Sistema alunos</title>
</head>
<body>
    <main id="main">
        <nav id="nav" style="background-image: url(../images/image__5_-removebg-preview.png);background-repeat: no-repeat;background-size: 90%;background-position-x: 50%;">
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
            <div class="Divinput">
                <form  id="dadosAlunosEditar" method="POST">
                <h1>Editar aluno</h1>
                <input value="<?php echo $nome ?>" name="nome" autocomplete="off" type="text" id="inputNome" class="input" placeholder="Nome" >
                <select name="escolaSelect" id="escolaSelect" class="input">
                    <option value="">Categoria da Escola:</option>
                    <option value="Municipal" <?php if($categoriaEscola === "Municipal"){echo 'selected';} ?>>Municipal</option>
                    <option value="Estadual" <?php if($categoriaEscola === "Estadual"){echo 'selected';} ?>>Estadual</option>
                    <option value="Particular" <?php if($categoriaEscola === "Particular"){echo 'selected';} ?>>Particular</option>
                </select>
                <input value="<?php echo $escola ?>" name="escola" autocomplete="off" type="text" id="inputEscola" class="input" placeholder="Escola">
                <input value="<?php echo $endereco ?>" name="endereco" autocomplete="off" type="text" id="inputEndereco" class="input" placeholder="Endereço">
                <input value="<?php echo $bairro ?>" name="bairro" autocomplete="off" type="text" id="inputBairro" class="input" placeholder="Bairro">
                <input value="<?php echo $data ?>" name="data_nasc" autocomplete="off" type="date" id="inputData" class="input" placeholder="Data de nascimento">
                <input value="<?php echo $telefone ?>" name="telefone" autocomplete="off" type="text" id="inputTelefone" class="input" placeholder="Telefone">
                <input value="<?php echo $doc ?>" name="doc" autocomplete="off" type="text" id="inputCpf" class="input" placeholder="CPF/RG/CN">
                <input value="<?php echo $responsavel ?>" name="responsavel" type="text" id="inputResponsavel" class="input" placeholder="Responsável">
                <div class="divInputSelectAll">
                    <div class="inputSelectUm">
                    <h2>1º Modalidade</h2>
                    <select name="priModalidade" onchange="selectChange('priModalidade', 'priHorario', 'priProfessor')" id="priModalidade" aria-placeholder="AA" class="input">
                        <option value="">Modalidade</option>
                        <?php
                            foreach ($modalidades as $modalidade) {
                                echo '<option value="' . $modalidade . '">' . $modalidade . '</option>';
                            }
                        ?>
                    </select>
                    <select name="priHorario" id="priHorario"  onchange="selectChangeHorario('priModalidade', 'priHorario', 'priProfessor')" aria-placeholder="AA" class="input" >
                        <option value="">Horário</option>
                    </select>
                    <select name="priProfessor" id="priProfessor" aria-placeholder="AA" class="input">
                        <option value="">Professor</option>
                    </select> 
                </div>
                    <div  id="modalidadeDois">
                        <h2>2º Modalidade</h2>
                        <select name="segModalidade" id="segModalidade" onchange="selectChange('segModalidade', 'segHorario', 'segProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Modalidade</option>
                            <?php
                            foreach ($modalidades as $modalidade) {
                                echo '<option value="' . $modalidade . '">' . $modalidade . '</option>';
                            }
                        ?>
                        ?>
                        </select>
                        <select name="segHorario" id="segHorario" onchange="selectChangeHorario('segModalidade', 'segHorario', 'segProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Horário</option>
                        </select>
                        <select name="segProfessor" id="segProfessor" aria-placeholder="AA" class="input">
                            <option value="">Professor</option>
                        </select>
                    </div>
                    <div  id="modalidadeTres">
                        <h2>3º Modalidade</h2>
                        <select name="terModalidade" id="terModalidade" onchange="selectChange('terModalidade', 'terHorario', 'terProfessor')" aria-placeholder="AA" class="input">
                        <option value="">Modalidade</option>
                        <?php
                            foreach ($modalidades as $modalidade) {
                                echo '<option value="' . $modalidade . '">' . $modalidade . '</option>';
                            }
                        ?>
                        </select>
                        <select name="terHorario" id="terHorario" onchange="selectChangeHorario('terModalidade', 'terHorario', 'terProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Horário</option>
                        </select>
                        <select name="terProfessor" id="terProfessor" aria-placeholder="AA" class="input">
                            <option value="">Professor</option>
                        </select> 
                    </div>
                    <div  id="modalidadeQuatro">
                        <h2>4º Modalidade</h2>
                        <select name="quaModalidade" id="quaModalidade" onchange="selectChange('quaModalidade', 'quaHorario', 'quaProfessor')" aria-placeholder="AA" class="input">
                        <option value="">Modalidade</option>
                        <?php
                            foreach ($modalidades as $modalidade) {
                                echo '<option value="' . $modalidade . '">' . $modalidade . '</option>';
                            }
                        ?>
                        </select>
                        <select name="quaHorario" id="quaHorario" onchange="selectChangeHorario('quaModalidade', 'quaHorario', 'quaProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Horário</option>
                        </select>
                        <select name="quaProfessor" id="quaProfessor" aria-placeholder="AA" class="input">
                            <option value="">Professor</option>
                        </select> 
                    </div>
                    <div  id="modalidadeCinco">
                        <h2>5º Modalidade</h2>
                        <select name="quiModalidade" id="quiModalidade" onchange="selectChange('quiModalidade', 'quiHorario', 'quiProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Modalidade</option>
                            <?php
                            foreach ($modalidades as $modalidade) {
                                echo '<option value="' . $modalidade . '">' . $modalidade . '</option>';
                            }
                        ?>
                        </select>
                        <select name="quiHorario" id="quiHorario" onchange="selectChangeHorario('quiModalidade', 'quiHorario', 'quiProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Horário</option>
                        </select>
                        <select name="quiProfessor" id="quiProfessor" aria-placeholder="AA" class="input">
                            <option value="">Professor</option>
                        </select> 
                    </div>
                    <div  id="modalidadeSeis">
                        <h2>6º Modalidade</h2>
                        <select name="sexModalidade" id="sexModalidade" onchange="selectChange('sexModalidade', 'sexHorario', 'sexProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Modalidade</option>
                            <?php
                            foreach ($modalidades as $modalidade) {
                                echo '<option value="' . $modalidade . '">' . $modalidade . '</option>';
                            }
                        ?>
                        </select>
                        <select name="sexHorario" id="sexHorario" onchange="selectChangeHorario('sexModalidade', 'sexHorario', 'sexProfessor')" aria-placeholder="AA" class="input">
                            <option value="">Horário</option>
                        </select>
                        <select name="sexProfessor" id="sexProfessor" aria-placeholder="AA" class="input">
                            <option value="">Professor</option>
                        </select>  
                    </div>
                </div>
                <button class="input" id="buttonModalidade" type="button">Adicionar modalidade</button> <br>
                <button class="input" id="buttonRemover" type="button">Remover modalidade</button> <br>
                <input name="submit" type="submit" value="Editar aluno" class="inputEdit" id="inputEditar">
                <button class="input" type="button" id="removerAluno">Remover aluno</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
<script>
    if( window.history.replaceState){window.history.replaceState( null, null, window.location.href );}
    const dados = <?php echo json_encode(value: $dados, flags: JSON_PRETTY_PRINT); ?>;
    const infoAluno = <?php echo json_encode($infoAluno, JSON_PRETTY_PRINT); ?>;
    let nummModalidade = <?php echo json_encode($numModalidade, JSON_PRETTY_PRINT); ?>;
</script>
<script src="../assets/jquerry/jquerry.js"></script>
<script src="../js/indexEdit.js"></script>
<?php
    if(!$state){
        echo "<script>let url = '../html/verTodosAlunos.php'
                    state = false
        </script>";
    }
    if($state){
        echo "<script>
                buttonEditarAluno.value = 'Inserir aluno';
                let url = '../html/alunosInativos.php';
                let urlDataProcessing = '../php/dataProcessingInativo.php';
                state = true
        </script>";

    };
    echo 
    "<script>
        const dias = ['inputPriModalidade','inputPriHorario','inputPriProfessor']
        window.onLoad = insertData(inputPriModalidade,inputPriHorario,inputPriProfessor, 'priModalidade','priHorario','priProfessor'),
                        insertData(inputSegModalidade,inputSegHorario,inputSegProfessor, 'segModalidade','segHorario','segProfessor'),
                        insertData(inputTerModalidade,inputTerHorario,inputTerProfessor, 'terModalidade','terHorario','terProfessor'),
                        insertData(inputQuaModalidade,inputQuaHorario,inputQuaProfessor, 'quaModalidade','quaHorario','quaProfessor'),
                        insertData(inputQuiModalidade,inputQuiHorario,inputQuiProfessor, 'quiModalidade','quiHorario','quiProfessor'),
                        insertData(inputSexModalidade,inputSexHorario,inputSexProfessor, 'sexModalidade','sexHorario','sexProfessor'),
                        idCatch($numModalidade, $id);
    </script>";
?>
