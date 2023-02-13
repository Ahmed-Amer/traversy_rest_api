$(function(){


    //get all posts
    // $.get("http://localhost/Traversy_RestAPI/api/posts/read.php" , function(data){
    //     for(var i = 0; i<data['data'].length; i++)
    //     {
    //         $('#posts').append("<li>"+data['data'][i].title+"</li>");
    //     }
    // } , 'json');
    

    
    /*get single post with id = 3*/
    // $.get("http://localhost/Traversy_RestAPI/api/posts/read_single.php?id=3" , function(data){
      
    //     $('#posts').append("<li>"+data.title+"</li>");
    //     console.log(data);
        
    // } , 'json');

    
    /*Posting(Creating) a post*/
    // $.post("http://localhost/Traversy_RestAPI/api/posts/create.php" 
    // , 
    // {
    //     "title":"Technology Post Testing 26",
    //     "body":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus.Test",
    //     "author":"Ahmed Mohamed",
    //     "category_id":"1",
    // }
    // ,
    // function(data){
      
    //     $('#posts').append("<li>"+data.message+"</li>"); 
    //     console.log(data);       
    // } 
    // , 'json');




    /*Updating a post (PUT Method)*/
    // let data = {
    //     "title":"Updated Post 18",
    //     "body":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus.Test",
    //     "author":"Ahmed Mohamed",
    //     "category_id":"4",
    //     "id" : "18"
    // }

    // $.ajax({
    //     type:"PUT",
    //     url : "http://localhost/Traversy_RestAPI/api/posts/update.php",
    //     data : JSON.stringify(data), // access in body 
    //     success: function(data){
    //         $('#posts').append("<li>"+data.message+"</li>"); 
    //          console.log(data);
    //     }
    //     ,
    //     error: function(data){
    //         $('#posts').append("<li>"+data.message+"</li>"); 
    //         console.log(data);
    //     }
    // })



    

    /*Deleting a post (DELETE)*/
    let data = {
        "id" : "16"
    }

    $.ajax({
        type:"DeLETE",
        url : "http://localhost/Traversy_RestAPI/api/posts/delete.php",
        data : JSON.stringify(data), // access in body 
        success: function(data){
            $('#posts').append("<li>"+data.message+"</li>"); 
             console.log(data);
        }
        ,
        error: function(data){
            $('#posts').append("<li>"+data.message+"</li>"); 
            console.log(data);
        }
    })




     /*Deleting a post (POST)*/
    //  let data = {
    //     "id" : "17"
    // }

    // $.ajax({
    //     type:"POST",
    //     url : "http://localhost/Traversy_RestAPI/api/posts/delete.php",
    //     data : data, // access in body 
    //     success: function(data){
    //         $('#posts').append("<li>"+data.message+"</li>"); 
    //          console.log(data);
    //     }
    //     ,
    //     error: function(data){
    //         $('#posts').append("<li>"+data.message+"</li>"); 
    //         console.log(data);
    //     }
    // })


    
}); 
    