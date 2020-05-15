$(document).ready(function(){


    console.log('Funcionando');
    $('#task-result').hide();
    

    $('#search').keyup(function(e){
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url : 'taskSearch.php',
                type : 'POST',
                data : {search},
                success : function(response){
                    //console.log(response);
                    let tasks = JSON.parse(response);
                    let template = "";

                    tasks.forEach(task => {
                        template += `<li>
                            ${task.name}
                        </li>`
                    });
                    if(tasks != 0 ){
                        $('#container').html(template);
                    $('#task-result').show();
                    }else{
                        $('#task-result').hide();
                    }                    
                }
            });
        }else
        {
            $('#task-result').hide();
        }
    });

    $('#task-form').submit(function(e){
        
        if(editar==false){
            const postData = {
                name : $('#name').val(),
                description : $('#description').val()
            };
            $.post('taskAdd.php',postData, function(response){
                console.log(response);
                $('#task-form').trigger('reset');
            })
        }else{
            const postData = {
            name : $('#name').val(),
            description : $('#description').val(),
            id : idEditar 
            };
            $.post('taskEdit.php',postData, function(response){
                console.log(response);
                $('#task-form').trigger('reset');
            })  
        }      
        e.preventDefault();
    });      

});