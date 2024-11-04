const buttonModalidade = document.getElementById("buttonModalidade")
const buttonRemover = document.getElementById("buttonRemover")
const buttonAdicionarAluno = document.getElementById("inputAdicionar")
const buttonEditarAluno = document.getElementById("inputEditar")

const selectMod = [document.getElementById("priModalidade"),document.getElementById("segModalidade"),document.getElementById("terModalidade"),document.getElementById("quaModalidade"),document.getElementById("quiModalidade"),document.getElementById("sexModalidade")];

const selectHor = [document.getElementById("priHorario"),document.getElementById("segHorario"),document.getElementById("terHorario"),document.getElementById("quaHorario"),document.getElementById("quiHorario"),document.getElementById("sexHorario")];

const selectPro = [document.getElementById("priProfessor"),document.getElementById("segProfessor"),document.getElementById("terProfessor"),document.getElementById("quaProfessor"),document.getElementById("quiProfessor"),document.getElementById("sexProfessor")];

let modalidadeDois = document.getElementById("modalidadeDois")
let modalidadeTres = document.getElementById("modalidadeTres")
let modalidadeQuatro = document.getElementById("modalidadeQuatro")
let modalidadeCinco = document.getElementById("modalidadeCinco")
let modalidadeSeis = document.getElementById("modalidadeSeis")

let state
let main = document.getElementById("main")
let nav = document.getElementById("nav")
let adition = document.getElementById("adition")

let allInputs = document.getElementsByTagName("input")

let inputNome = document.getElementById("inputNome")
let inputEscola = document.getElementById("inputEscola")
let inputEscolaSelect = document.getElementById("escolaSelect")
let inputEndereco = document.getElementById("inputEndereco")
let inputBairro = document.getElementById("inputBairro")
let inputData = document.getElementById("inputData")
let inputTelefone = document.getElementById("inputTelefone")
let inputCpf = document.getElementById("inputCpf")
let inputResponsavel = document.getElementById("inputResponsavel")
let inputPriModalidade = document.getElementById("priModalidade")
let inputPriHorario = document.getElementById("priHorario")
let inputPriProfessor = document.getElementById("priProfessor")
let inputSegModalidade = document.getElementById("segModalidade")
let inputSegHorario = document.getElementById("segHorario")
let inputSegProfessor = document.getElementById("segProfessor")
let inputTerModalidade = document.getElementById("terModalidade")
let inputTerHorario = document.getElementById("terHorario")
let inputTerProfessor = document.getElementById("terProfessor")
let inputQuaModalidade = document.getElementById("quaModalidade")
let inputQuaHorario = document.getElementById("quaHorario")
let inputQuaProfessor = document.getElementById("quaProfessor")
let inputQuiModalidade = document.getElementById("quiModalidade")
let inputQuiHorario = document.getElementById("quiHorario")
let inputQuiProfessor = document.getElementById("quiProfessor")
let inputSexModalidade = document.getElementById("sexModalidade")
let inputSexHorario = document.getElementById("sexHorario");
let inputSexProfessor = document.getElementById("sexProfessor")
let numeroModalidades = 1 
function idCatch(varModPhp, idAluno){
    numeroModalidades = varModPhp
    idDoAluno = idAluno
    switch(varModPhp){
        case 1:
            modalidadeDois.style.display = "none"
            modalidadeTres.style.display = "none"
            modalidadeQuatro.style.display = "none"
            modalidadeCinco.style.display = "none"
            modalidadeSeis.style.display = "none"
        break
        case 2:
            modalidadeTres.style.display = "none"
            modalidadeQuatro.style.display = "none"
            modalidadeCinco.style.display = "none"
            modalidadeSeis.style.display = "none"
        break
        case 3:
            modalidadeQuatro.style.display = "none"
            modalidadeCinco.style.display = "none"
            modalidadeSeis.style.display = "none"
        break
        case 4:
            modalidadeCinco.style.display = "none"
            modalidadeSeis.style.display = "none"
        break
        case 5:
            modalidadeSeis.style.display = "none"
        break
        case 6:
        break
    }
    if(numeroModalidades === 6){
        buttonModalidade.style.display = "none"
        buttonRemover.style.display = "inline"
        buttonRemover.style.marginTop = "-15px"
    }
}
buttonModalidade.addEventListener("click", ()=>{
    switch(numeroModalidades){
        case 1:modalidadeDois.style.display = "block";buttonRemover.style.display = "inline";numeroModalidades++;break;
        case 2:modalidadeTres.style.display = "block";numeroModalidades++;break;
        case 3:modalidadeQuatro.style.display = "block";numeroModalidades++;break;
        case 4:modalidadeCinco.style.display = "block";numeroModalidades++;break;
        case 5:modalidadeSeis.style.display = "block";buttonModalidade.style.display = "none";buttonRemover.style.marginTop = "-15px";numeroModalidades++;break;
    } 
})
buttonRemover.addEventListener("click", ()=>{
    switch (numeroModalidades){
        case 2:modalidadeDois.style.display = "none";buttonRemover.style.display = "none";numeroModalidades--;break;
        case 3:modalidadeTres.style.display = "none";numeroModalidades--;break;
        case 4:modalidadeQuatro.style.display = "none";numeroModalidades--;break;
        case 5:modalidadeCinco.style.display = "none";numeroModalidades--;break;
        case 6:modalidadeSeis.style.display = "none";buttonModalidade.style.display = "inline" ;buttonRemover.style.marginTop = "15px";numeroModalidades--;break;
    }
})
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
function cleanRows(){
inputNome.value = "";inputEscola.value = "";inputEndereco.value = "";inputBairro.value = "";inputData.value = "";inputTelefone.value = "";inputCpf.value = "";inputResponsavel.value = "";inputPriModalidade.value = "";inputPriHorario.value = "";inputPriProfessor.value = "";inputSegModalidade.value = "";inputSegHorario.value = "";inputSegProfessor.value = "";inputTerModalidade.value = "";inputTerHorario.value = "";inputTerProfessor.value = "";inputQuaModalidade.value = "";inputQuaHorario.value = "";inputQuaProfessor.value = "";inputQuiModalidade.value = "";inputQuiHorario.value = "";inputQuiProfessor.value = ""
}
$('#dadosAlunosEditar').submit(function (e) { 
    e.preventDefault();
    verifyComplete()
    console.log()
    if(arrayVerify.every(arrayVerify => arrayVerify !== false)){
        if(state === false){
            $.ajax({
                url: "../php/dataProcessingEdit.php",
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
                    numModalidade: numeroModalidades,
                    id: idDoAluno
                }
            });
        }
        if(state === true){
            $.ajax({
                url: "../php/dataProcessingInativo.php",
                method: "POST",
                data: {id: idDoAluno}
            });
        }
        alert("Aluno editado com sucesso")
        window.location.href = url
        cleanRows()
    }
    else{
        alert("Verifique os campos.")
    }
});
const buttonRemoverAluno = document.getElementById("removerAluno")
var button = $("#removerAluno")
button.on("click", ()=>{
  var mensagem = state ? "Deseja remover o aluno permanentemente?" : "Deseja remover o aluno?";
  var confirmado = confirm(mensagem);
  if(confirmado){
    if(!state){
        $.ajax({
            type: "POST",
            url: "../php/dataProcessingDelete.php",
            data: {id: idDoAluno, state: state}
        });
          alert('Removido!');
        window.location.href = url
    } else if(state){
        $.ajax({
            type: "POST",
            url: "../php/dataProcessingDelete.php",
            data: {id: idDoAluno, state:state}
        });
          alert('Removido!');
        window.location.href = url
    }
  }
})
selectMod.forEach((select, index) => {
    select.addEventListener("change", function () {
        selectAble(selectMod[index], selectHor[index], selectPro[index]);
    });
})

selectHor.forEach((select, index) => {
    select.addEventListener("change", function () {
        selectAble(selectHor[index], selectPro[index], selectPro[index]);
    });
});
function selectChange(modalidadeId, horarioId, professorId) {
    const selectModalidade = document.querySelector(`#${modalidadeId}`);
    const selectHorario = document.querySelector(`#${horarioId}`);
    const selectProfessor = document.querySelector(`#${professorId}`);
    selectHorario.innerHTML = "";
    selectProfessor.innerHTML = "";
    const opcaoPadraoHorario = document.createElement("option");
    opcaoPadraoHorario.value = "";
    opcaoPadraoHorario.text = "Horário";
    selectHorario.appendChild(opcaoPadraoHorario);
    const opcaoPadraoProfessor = document.createElement("option");
    opcaoPadraoProfessor.value = "";
    opcaoPadraoProfessor.text = "Professor";
    selectProfessor.appendChild(opcaoPadraoProfessor);
    const selectedModalidade = selectModalidade.value;
    if (selectedModalidade && dados[selectedModalidade]) {
        Object.keys(dados[selectedModalidade]).forEach(function (horario) {
            const novaOpcao = document.createElement("option");
            novaOpcao.value = horario;
            novaOpcao.text = horario;
            selectHorario.appendChild(novaOpcao);
        });
        selectHorario.disabled = false;
    } 
}
function selectChangeHorario(modalidadeId, horarioId, professorId) {
    const selectModalidade = document.querySelector(`#${modalidadeId}`);
    const selectHorario = document.querySelector(`#${horarioId}`);
    const selectProfessor = document.querySelector(`#${professorId}`);
    const selectedModalidade = selectModalidade.value;
    const selectedHorario = selectHorario.value;
    const currentProfessorValue = selectProfessor.value;
    selectProfessor.innerHTML = "";
    const opcaoPadraoProfessor = document.createElement("option");
    opcaoPadraoProfessor.value = "";
    opcaoPadraoProfessor.text = "Professor";
    selectProfessor.appendChild(opcaoPadraoProfessor);
    const availableProfessors = dados[selectedModalidade]?.[selectedHorario];
    if (availableProfessors) {
        availableProfessors.forEach(function (professor) {
            const novaOpcao = document.createElement("option");
            novaOpcao.value = professor;
            novaOpcao.text = professor;
            selectProfessor.appendChild(novaOpcao);
        });
        selectProfessor.disabled = false;
    }
    if (currentProfessorValue && ![...selectProfessor.options].some(option => option.value === currentProfessorValue)) {
        const missingOption = document.createElement("option");
        missingOption.value = currentProfessorValue;
        missingOption.text = currentProfessorValue;
        selectProfessor.appendChild(missingOption);
    }
    selectProfessor.value = currentProfessorValue;
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
function insertData(inputModalidade, inputHorario, inputProfessor, modalidade, horario, professor) {
    const studentData = infoAluno[modalidade];
    if (![...inputModalidade.options].some(option => option.value === studentData['modalidade'])) {
        const missingOption = document.createElement("option");
        missingOption.value = studentData['modalidade'];
        missingOption.text = studentData['modalidade'];
        inputModalidade.appendChild(missingOption);
    }
    inputModalidade.value = studentData['modalidade'];
    selectChange(modalidade, horario, professor);
    if (![...inputHorario.options].some(option => option.value === studentData['horario'])) {
        const missingOption = document.createElement("option");
        missingOption.value = studentData['horario'];
        missingOption.text = studentData['horario'];
        inputHorario.appendChild(missingOption);
    }
    inputHorario.value = studentData['horario'];
    selectChangeHorario(modalidade, horario, professor);
    if (![...inputProfessor.options].some(option => option.value === studentData['professor'])) {
        const missingOption = document.createElement("option");
        missingOption.value = studentData['professor'];
        missingOption.text = studentData['professor'];
        inputProfessor.appendChild(missingOption);
    }
    inputProfessor.value = studentData['professor'];
}
if(inputEscola !==""){
    inputEscolaSelect.style.display = "inline"
    inputEscola.style.width = "80.5%"
} 
if(inputEscolaSelect.value === ""){
        inputEscola.style.width = "95.8%"
        inputEscolaSelect.style.display = "none"

}
inputEscola.addEventListener("keyup", ()=>{
    if(inputEscola.value !== ""){
        inputEscola.style.width = "80.5%"
        inputEscolaSelect.style.display = "inline"

    } else if(inputEscola.value === ""){
        inputEscola.style.width = "95.8%"
        inputEscolaSelect.style.display = "none"
        inputEscolaSelect.value = ""
    }
})






















