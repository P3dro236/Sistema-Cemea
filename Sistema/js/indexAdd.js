let inputModalidade = document.querySelector("#inputModalidade")
let inputHorario = document.querySelector("#inputHorario")
let inputProfessor = document.querySelector("#inputProfessor")

const buttonRemoverModalidade = document.querySelector("#buttonRemoverModalidade")

function changeColor(modalidade, horario, professor){
    if(modalidade.value == ""){modalidade.style.border = "1px solid red"} 
    else{modalidade.style.border = "0.4px solid black"}
    if(horario.value == ""){horario.style.border = "1px solid red"} 
    else{horario.style.border = "0.4px solid black"}
    if(professor.value == ""){professor.style.border = "1px solid red"} 
    else{professor.style.border = "0.4px solid black"}
    if(modalidade.value != "" && horario.value != "" && professor.value != ""){
        return true;
    }
}
$('#addModalidade').submit(function (e) { 
    e.preventDefault();
    if(changeColor(inputModalidade, inputHorario, inputProfessor)){
        $.ajax({
            type: "POST",
            url: "../php/dataProcessingAddModalidade.php",
            data: {modalidade: inputModalidade.value, horario:inputHorario.value, professor: inputProfessor.value}
        });
        window.location.href = "adicionarModalidade.php"
    } else{
        alert("Verifique os campos")
    }
});
$(document).on("click", ".buttonRemoverModalidade", function () {
    const id = $(this).val(); // Captura o valor do botão clicado
    let confirmado = confirm("Deseja excluir a modalidade?")
    $.ajax({
        type: "POST",
        url: "../php/dataProcessingRemoveModalidade.php",
        data: {id:id}
    });
    window.location.href = "adicionarModalidade.php"
});