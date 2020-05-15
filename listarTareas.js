$(document).ready(function(){
    listTask();
    
    function listTask(){
        $.ajax({
            url : 'taskList.php',
            type: 'GET',
            success : function (response){
                if(response == 0){
                    window.location.replace('login.html');
                    alert('No podras ver datos porque no haz ingresado al sistema');
                }else{
                listTask();                
                let task = JSON.parse(response);
                let template = '';          
                    task.forEach(task =>{
                        template += `
                            <tr taskId="${task.id}"> 
                                <td>${task.id}</td>
                                <td>${task.name}</td>
                                <td>${task.description}</td>
                                <td>
                                    <button class="taskDelete btn btn-danger">Eliminar</button>
                                </td>
                                <td>
                                    <button class="taskItem btn btn-warning">Modificar</button>
                            </tr>
                        `
                    });
                    $('#tasks').html(template);
                }
            }
        });
    }
    $(document).on('click','.taskDelete', function(){
        if(confirm('¿Estas seguro de eliminar la tarea?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            $.post('taskDelete.php',{id:id}, function(response){
                listTask();
        });
        }
    });  

    $(document).on('click','.taskItem', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        //console.log(id);
        $.post('taskUpdate.php',{id:id}, function(response){
            console.log(response);
            window.location.replace('EditarTarea.html');
        })
    });
}); 