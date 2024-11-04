function adicionarModalidade(){
    switch(numeroModalidades){
        case 1:modalidadeDois.style.display = "block";buttonRemover.style.display = "inline";numeroModalidades++;break;
        case 2:modalidadeTres.style.display = "block";numeroModalidades++;break;
        case 3:modalidadeQuatro.style.display = "block";numeroModalidades++;break;
        case 4:modalidadeCinco.style.display = "block";numeroModalidades++;break;
        case 5:modalidadeSeis.style.display = "block";buttonModalidade.style.display = "none";buttonRemover.style.marginTop = "-15px";numeroModalidades++;break;
    } 
}
function removerModalidade(){
    switch (numeroModalidades){
        case 2:modalidadeDois.style.display = "none";buttonRemover.style.display = "none";numeroModalidades--;break;
        case 3:modalidadeTres.style.display = "none";numeroModalidades--;break;
        case 4:modalidadeQuatro.style.display = "none";numeroModalidades--;break;
        case 5:modalidadeCinco.style.display = "none";numeroModalidades--;break;
        case 6:modalidadeSeis.style.display = "none";buttonModalidade.style.display = "inline" ;buttonRemover.style.marginTop = "15px";numeroModalidades--;break;
    }
}
let arrayVerify = [false, false, false, false, false, false] 
function changeColor(modalidade, horario, professor){
    if(modalidade.value == ""){modalidade.style.border = "1px solid red"; arrayVerify[0] = false} 
    else{modalidade.style.border = "0.4px solid black"; arrayVerify[0] = true}
    if(horario.value == ""){horario.style.border = "1px solid red"; arrayVerify[0] = false} 
    else{horario.style.border = "0.4px solid black"; arrayVerify[1] = true}
    if(professor.value == ""){professor.style.border = "1px solid red"; arrayVerify[2] = false} 
    else{professor.style.border = "0.4px solid black"; arrayVerify[2] = true}
    if(inputNome.value == ""){inputNome.style.border = "1px solid red"; arrayVerify[3] = false} 
    else{inputNome.style.border = "0.4px solid black"; arrayVerify[3] = true}
    if(inputData.value == ""){inputData.style.border = "1px solid red"; arrayVerify[4] = false} 
    else{inputData.style.border = "0.4px solid black"; arrayVerify[4] = true}
    if(inputEscola.value !== ""){
        if(inputEscolaSelect.value === ""){
            inputEscolaSelect.style.border = "1px solid red";
            arrayVerify[5] = false
        } 
        else{
            inputEscolaSelect.style.border = "0.4px solid black";
            arrayVerify[5] = true
        }
    }else{
        arrayVerify [5] = true
    }
}
function verifyComplete() {
    switch (numeroModalidades) {
        case 1:
            changeColor(inputPriModalidade, inputPriHorario, inputPriProfessor);
        break
        case 2:
            changeColor(inputPriModalidade, inputPriHorario, inputPriProfessor);
            changeColor(inputSegModalidade, inputSegHorario, inputSegProfessor);
        break    
        case 3:
            changeColor(inputPriModalidade, inputPriHorario, inputPriProfessor);
            changeColor(inputSegModalidade, inputSegHorario, inputSegProfessor);
            changeColor(inputTerModalidade, inputTerHorario, inputTerProfessor);
        break
        case 4:
            changeColor(inputPriModalidade, inputPriHorario, inputPriProfessor);
            changeColor(inputSegModalidade, inputSegHorario, inputSegProfessor);
            changeColor(inputTerModalidade, inputTerHorario, inputTerProfessor);
            changeColor(inputQuaModalidade, inputQuaHorario, inputQuaProfessor);
        break        
        case 5:
            changeColor(inputPriModalidade, inputPriHorario, inputPriProfessor);
            changeColor(inputSegModalidade, inputSegHorario, inputSegProfessor);
            changeColor(inputTerModalidade, inputTerHorario, inputTerProfessor);
            changeColor(inputQuaModalidade, inputQuaHorario, inputQuaProfessor);
            changeColor(inputQuiModalidade, inputQuiHorario, inputQuiProfessor);
        break
        case 6:
            changeColor(inputPriModalidade, inputPriHorario, inputPriProfessor);
            changeColor(inputSegModalidade, inputSegHorario, inputSegProfessor);
            changeColor(inputTerModalidade, inputTerHorario, inputTerProfessor);
            changeColor(inputQuaModalidade, inputQuaHorario, inputQuaProfessor);
            changeColor(inputQuiModalidade, inputQuiHorario, inputQuiProfessor);
            changeColor(inputSexModalidade, inputSexHorario, inputSexProfessor);
        break
    }
}
$('#dadosAlunos').submit(function (e) { 
    e.preventDefault();
    verifyComplete()
    console.log()
    if(arrayVerify.every(arrayVerify => arrayVerify !== false)){
         $.ajax({
             url: "../php/dataProcessing.php",
             method: "POST",
             data: {nome: inputNome.value,
                 escola: inputEscola.value,
                 categoriaEscola: inputEscolaSelect.value,
                 endereco: inputEndereco.value,
                 bairro: inputBairro.value,
                 data: inputData.value,
                 telefone: inputTelefone.value,
                 doc: inputCpf.value,
                 responsavel: inputResponsavel.value,
                 priModalidade: inputPriModalidade.value,
                 priHorario: inputPriHorario.value,
                 priProfessor: inputPriProfessor.value,
                 segModalidade: inputSegModalidade.value,
                 segHorario: inputSegHorario.value,
                 segProfessor: inputSegProfessor.value,
                 terModalidade: inputTerModalidade.value,
                 terHorario: inputTerHorario.value,
                 terProfessor: inputTerProfessor.value,
                 quaModalidade: inputQuaModalidade.value,
                 quaHorario: inputQuaHorario.value,
                 quaProfessor: inputQuaProfessor.value,
                 quiModalidade: inputQuiModalidade.value,
                 quiHorario:inputQuiHorario.value,
                 quiProfessor: inputQuiProfessor.value,
                 sexModalidade: inputSexModalidade.value,
                 sexHorario:inputSexHorario.value,
                 sexProfessor: inputSexProfessor.value,
                 numModalidade: numeroModalidades
             }
         });
         alert("Aluno adicionado com sucesso")
         window.location.href = "index.php"
     }
     else{
         alert("Verifique os campos.")
     }
});
function modalidadesTres(quartoHorario){
    alert(quartoHorario)
}

function selectAble(selectModalidade, selectHorario, selectProfessor) {
    if (selectModalidade.value !== "") {
        selectHorario.disabled = false;
    } else {
        selectHorario.disabled = true;
        selectHorario.value = "";
        selectProfessor.disabled = true;
        selectProfessor.value = "";
    }
}
