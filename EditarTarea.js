$(document).ready(function(){

    let idEditar = "";
    let editar = false;   
    console.log('Funcionando Agregar/Editar.js');
    ponerElementos();
    

    function ponerElementos(){
        $.ajax({
            url : 'taskEditList.php',
            type : 'GET',
            success : function(response){
                console.log(response);
                const task = JSON.parse(response);
                $('#name').val(task.name);
                $('#description').val(task.description);
                idEditar = task.id;        
                editar = true;
            }
        });
    }

    $('#task-form').submit(function(e){      
            const postData = {
            name : $('#name').val(),
            description : $('#description').val(),
            id : idEditar 
            };
            $.post('taskEdit.php',postData, function(response){
                console.log(response);
                $('#task-form').trigger('reset');
                alert('Registro modificado')
                window.location.replace('listarTareas.html');
                e.preventDefault(); 
            
        
            });
    });
    
});