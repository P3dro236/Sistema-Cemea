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

let main = document.getElementById("main")
let nav = document.getElementById("nav")
let adition = document.getElementById("adition")

let allInputs = document.getElementsByTagName("input")

let inputNome = document.getElementById("inputNome")
let inputEscolaSelect = document.getElementById("escolaSelect")
let inputEscola = document.getElementById("inputEscola")
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
let inputSexHorario = document.getElementById("sexHorario")
let inputSexProfessor = document.getElementById("sexProfessor")

let numeroModalidades = 1

buttonModalidade.addEventListener("click", adicionarModalidade)
buttonRemover.addEventListener("click", removerModalidade)

// Adicionando event listeners para as modalidades de forma dinâmica
selectMod.forEach((select, index) => {
    select.addEventListener("change", function () {
        selectAble(selectMod[index], selectHor[index], selectPro[index]);
    });
});

// Adicionando event listeners para os horários de forma dinâmica
selectHor.forEach((select, index) => {
    select.addEventListener("change", function () {
        selectAble(selectHor[index], selectPro[index], selectPro[index]);
    });
});
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
















function selectChange(modalidadeId, horarioId, professorId) {
    const selectModalidade = document.querySelector(`#${modalidadeId}`);
    const selectHorario = document.querySelector(`#${horarioId}`);
    const selectProfessor = document.querySelector(`#${professorId}`);

    // Limpa os selects de horário e professor
    selectHorario.innerHTML = "";
    selectProfessor.innerHTML = "";

    // Opção padrão para horário
    const opcaoPadraoHorario = document.createElement("option");
    opcaoPadraoHorario.value = "";
    opcaoPadraoHorario.text = "Horário";
    selectHorario.appendChild(opcaoPadraoHorario);

    // Opção padrão para professor
    const opcaoPadraoProfessor = document.createElement("option");
    opcaoPadraoProfessor.value = "";
    opcaoPadraoProfessor.text = "Professor";
    selectProfessor.appendChild(opcaoPadraoProfessor);

    // Obtém a modalidade selecionada
    const selectedModalidade = selectModalidade.value;

    // Verifica se há uma modalidade selecionada e se ela tem horários
    if (selectedModalidade && dados[selectedModalidade]) {
        // Adiciona os horários dessa modalidade ao segundo select
        Object.keys(dados[selectedModalidade]).forEach(function (horario) {
            const novaOpcao = document.createElement("option");
            novaOpcao.value = horario;
            novaOpcao.text = horario;
            selectHorario.appendChild(novaOpcao);
        });
        selectHorario.disabled = false;
    } else {
        selectHorario.disabled = true;
        selectProfessor.disabled = true;
    }
}

function selectChangeHorario(modalidadeId, horarioId, professorId) {
    const selectModalidade = document.querySelector(`#${modalidadeId}`);
    const selectHorario = document.querySelector(`#${horarioId}`);
    const selectProfessor = document.querySelector(`#${professorId}`);

    // Limpa as opções de professores
    selectProfessor.innerHTML = "";

    // Opção padrão para professor
    const opcaoPadraoProfessor = document.createElement("option");
    opcaoPadraoProfessor.value = "";
    opcaoPadraoProfessor.text = "Professor";
    selectProfessor.appendChild(opcaoPadraoProfessor);

    // Obtém a modalidade e horário selecionados
    const selectedModalidade = selectModalidade.value;
    const selectedHorario = selectHorario.value;

    // Verifica se há um horário válido e se ele tem professores
    if (selectedModalidade && selectedHorario && dados[selectedModalidade][selectedHorario]) {
        // Adiciona os professores correspondentes ao horário ao terceiro select
        dados[selectedModalidade][selectedHorario].forEach(function (professor) {
            const novaOpcao = document.createElement("option");
            novaOpcao.value = professor;
            novaOpcao.text = professor;
            selectProfessor.appendChild(novaOpcao);
        });
        selectProfessor.disabled = false;
    } else {
        selectProfessor.disabled = true;
    }
}




























