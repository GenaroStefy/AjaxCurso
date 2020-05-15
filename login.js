$(document).ready(function(){

    console.log('Funcionando login.js');

    $('#sesionform').submit(function(e){
        const posData = {
            usuario :$('#usuario').val(),
            contrasena : $('#contrasena').val()
        };

        $.post('login.php', posData, function(response){
            console.log(response);
            if(response == 1){
                window.location.replace('listarTareas.html');
            }else{
                alert('Fallo al entrar');
            }
            $('#sesionform').trigger('reset');
        })
        e.preventDefault();
    });
});