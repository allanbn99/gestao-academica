require('./bootstrap');

//Components
require('./components/modals/delete');
require('./components/InputMask/jquery-maskinput');

//Inicializacao do projeto
$(document).ready(function() {
    $('.toast').toast('show');
    $('#cpf').mask('999.999.999-99');
    
    $("#search_input").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#result_table tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    
});

$('#cep').mask('99999-999');
