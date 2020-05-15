$(document).ready(function(){

    console.log('Funcionando el AgregarTarea.js');
    
    $('#task-form').submit(function(e){
        $.ajax({
            url : 'taskAdd.php',
            type : 'POST',
            data : {
                name : $('#name').val(),
                description : $('#description').val()
            },
            success : function(response){
                console.log(response);
                window.location.replace('listarTareas.html');
            }
        });
        e.preventDefault();
    });

});