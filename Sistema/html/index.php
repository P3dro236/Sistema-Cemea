<?php  
    include_once("../php/config.php");

    // Consulta para modalidades
    $sql = "SELECT DISTINCT modalidade, horario, professor FROM modalidades";
    $result = $conexaoModalidades->query($sql);
    
    // Criar array para armazenar os dados
    $dados = [];
    
    
    if ($result->num_rows > 0) {
        // Iterar pelos resultados
        while($row = $result->fetch_assoc()) {
            $modalidade = $row['modalidade'];
            $horario = $row['horario'];
            $professor = $row['professor'];
    
            // Organizar os dados conforme o formato desejado
            if (!isset($dados[$modalidade])) {
                $dados[$modalidade] = [];
            }
    
            if (!isset($dados[$modalidade][$horario])) {
                $dados[$modalidade][$horario] = [];
            }
    
            $dados[$modalidade][$horario][] = $professor;
        }
    }


    $sqlModalidade = "SELECT DISTINCT modalidade FROM modalidades ORDER BY modalidade";
    $resultModalidade = $conexaoModalidades->query($sqlModalidade);
    
    // Criar array para armazenar as modalidades
    $modalidades = [];
    
    if ($resultModalidade->num_rows > 0) {
        // Iterar pelos resultModalidadeados
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
    <link rel="stylesheet" href="../styles/styles.css">
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
            <div class="Divinput">
                <form  id="dadosAlunos" method="POST">
                <h1>Adicionar Alunos</h1>
                <input name="nome" autocomplete="off" type="text" id="inputNome" class="input" placeholder="Nome">
                <select name="escolaSelect" id="escolaSelect" class="input">
                    <option value="">Categoria da Escola:</option>
                    <option value="Municipal">Municipal</option>
                    <option value="Estadual">Estadual</option>
                    <option value="Particular">Particular</option>
                </select>
                <input name="escola" autocomplete="off" type="text" id="inputEscola" class="input" placeholder="Escola">
                <input name="endereco" autocomplete="off" type="text" id="inputEndereco" class="input" placeholder="Endereço">
                <input name="bairro" autocomplete="off" type="text" id="inputBairro" class="input" placeholder="Bairro">
                <input name="data_nasc" autocomplete="off" type="date" id="inputData" class="input" placeholder="Data de nascimento">
                <input name="telefone" autocomplete="off" type="text" id="inputTelefone" class="input" placeholder="Telefone">
                <input name="doc" autocomplete="off" type="text" id="inputCpf" class="input" placeholder="CPF/RG/CN">
                <input name="responsavel" type="text" id="inputResponsavel" class="input" placeholder="Responsável">
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
                    <select name="priHorario" id="priHorario"  onchange="selectChangeHorario('priModalidade', 'priHorario', 'priProfessor')" aria-placeholder="AA" class="input" disabled>
                        <option value="">Horário</option>
                    </select>

                    <select name="priProfessor" id="priProfessor" aria-placeholder="AA" class="input" disabled>
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
                        </select>
                        <select name="segHorario" id="segHorario" onchange="selectChangeHorario('segModalidade', 'segHorario', 'segProfessor')" aria-placeholder="AA" class="input" disabled>
                            <option value="">Horário</option>
                        </select>
                        <select name="segProfessor" id="segProfessor" aria-placeholder="AA" class="input" disabled>
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
                        <select name="terHorario" id="terHorario" onchange="selectChangeHorario('terModalidade', 'terHorario', 'terProfessor')" aria-placeholder="AA" class="input" disabled>
                            <option value="">Horário</option>
                        </select>
                        <select name="terProfessor" id="terProfessor" aria-placeholder="AA" class="input" disabled>
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
                        <select name="quaHorario" id="quaHorario" onchange="selectChangeHorario('quaModalidade', 'quaHorario', 'quaProfessor')" aria-placeholder="AA" class="input" disabled>
                            <option value="">Horário</option>
                        </select>
                        <select name="quaProfessor" id="quaProfessor" aria-placeholder="AA" class="input" disabled>
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
                        <select name="quiHorario" id="quiHorario" onchange="selectChangeHorario('quiModalidade', 'quiHorario', 'quiProfessor')" aria-placeholder="AA" class="input" disabled>
                            <option value="">Horário</option>
                        </select>
                        <select name="quiProfessor" id="quiProfessor" aria-placeholder="AA" class="input" disabled>
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
                        <select name="sexHorario" id="sexHorario" onchange="selectChangeHorario('sexModalidade', 'sexHorario', 'sexProfessor')" aria-placeholder="AA" class="input" disabled>
                            <option value="">Horário</option>
                        </select>
                        <select name="sexProfessor" id="sexProfessor" aria-placeholder="AA" class="input" disabled>
                            <option value="">Professor</option>
                        </select> 
                    </div>
                </div>
                <button class="input" id="buttonModalidade" type="button">Adicionar modalidade</button> <br>
                <button class="input" id="buttonRemover" type="button">Remover modalidade</button> <br>
                <input name="submit" type="submit" value="Adicionar aluno" class="input" id="inputAdicionar">
                </form>
            </div>
        </div>
    </main>
</body>
</html>
<script>
    if( window.history.replaceState){window.history.replaceState( null, null, window.location.href );}
    const dados = <?php echo json_encode($dados, JSON_PRETTY_PRINT); ?>;
</script>

<script src="../assets/jquerry/jquerry.js"></script>
<script src="../js/functions.js"></script>
<script src="../js/index.js"></script>
