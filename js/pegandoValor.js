$(document).on("click", "#excluir", function() {
    var id3 = $(this).val();
    $("#inputExcluir").val(id3);
    console.log(id3);
});

$(document).on("click", "#alterar", function() {
    var id2 = $(this).val();
    $("#inputAlterar").val(id2);
    console.log(id2);
});

$(document).on("click", "#navCad", function() {
    var square = document.getElementById("editPerfil");
    square.style.display = "none";
    var square = document.getElementById("meuQuiosque");
    square.style.display = "none";
    var square = document.getElementById("Cad");
    square.style.display = "block";
    var square2 = document.getElementById("Cad2");
    square2.style.display = "block";
});

$(document).on("click", "#navEdit", function() {
    var square = document.getElementById("Cad");
    square.style.display = "none";
    var square2 = document.getElementById("Cad2");
    square2.style.display = "none";
    var square = document.getElementById("meuQuiosque");
    square.style.display = "none";
    var square = document.getElementById("editPerfil");
    square.style.display = "block";
});

$(document).on("click", "#navMyQq", function() {
    var square = document.getElementById("Cad");
    square.style.display = "none";
    var square2 = document.getElementById("Cad2");
    square2.style.display = "none";
    var square = document.getElementById("editPerfil");
    square.style.display = "none";
    var square = document.getElementById("meuQuiosque");
    square.style.display = "block";
});

$(document).on("click", "#navEditUsuario", function() {
    var square = document.getElementById("editPerfil");
    square.style.display = "block";
    var square = document.getElementById("Cad");
    square.style.display = "none";
});

$(document).on("click", "#navFavoritos", function() {
    var square = document.getElementById("Cad");
    square.style.display = "block";
    var square = document.getElementById("editPerfil");
    square.style.display = "none";
});

$(document).ready(function(){
     $('#cnpj').mask("99.999.999/9999-99");
});

$(document).ready(function(){
     $('#telefone').mask("(99) 99999-9999");
});

$(document).ready(function(){
     $('#cnpj').mask("99.999.999/9999-99");
});

$(document).ready(function(){
     $('#telefone').mask("(99) 99999-9999");
});
