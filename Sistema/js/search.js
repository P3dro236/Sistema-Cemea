const buttonSearch = document.getElementById("search")
const buttonSearchModalidade = document.getElementById("searchModalidade")
const buttonSearchInativo = document.getElementById("searchInativo")

let searchInput = document.getElementById("searchInput")
let searchInputModalidade = document.getElementById("searchInputModalidade")
let searchInputInativo = document.getElementById("searchInputInativo")

function search(){
    window.location.href = "verTodosAlunos.php?nome="+searchInput.value
}
function searchInativo(){
    window.location.href = "alunosInativos.php?nome="+searchInputInativo.value
}
function searchModalidade(){
    window.location.href = "modalidades.php?nome="+searchInputModalidade.value
}

if(searchInputModalidade !== null){
    buttonSearchModalidade.addEventListener("click", searchModalidade)
    searchInputModalidade.addEventListener('keydown', function (event) {
        if (event.keyCode !== 13) return;
        searchModalidade()
    });
}
if(searchInput !== null){
    buttonSearch.addEventListener("click", search)
    searchInput.addEventListener('keydown', function (event) {
        if (event.keyCode !== 13) return;
        search()
    });
}
if(searchInputInativo !== null){
    buttonSearchInativo.addEventListener("click", searchInativo)
    searchInputInativo.addEventListener('keydown', function (event) {
        if (event.keyCode !== 13) return;
        searchInativo()
    });
}
function idCatch(quaModalidade, quaHorario, quaProfessor, quiModalidade, quiHorario, quiProfessor, sexModalidade, sexHorario, sexProfessor) {
    if (!quaModalidade && !quiModalidade && !sexModalidade) {
        alert("Sem mais modalidades");
        return; 
    }

    let message = "";

    if (quaModalidade) {
        message += "4º Modalidade: " + quaModalidade + " | Horário: " + quaHorario + " | Professor: " + quaProfessor + "\n";
    }

    if (quiModalidade) {
        message += "5º Modalidade: " + quiModalidade + " | Horário: " + quiHorario + " | Professor: " + quiProfessor + "\n";
    }

    if (sexModalidade) {
        message += "6º Modalidade: " + sexModalidade + " | Horário: " + sexHorario + " | Professor: " + sexProfessor + "\n";
    }

    alert(message.trim());
}






