$(document).ready(function () {
    //Load post
    load_post();
    // reply button action
    $(document).on('click', '.reply', function(){  
      var idpanel = $(this).attr("data-id");  
      $("#panel" + idpanel).toggle();
    });
    // Comment form
    $("#comment-form").submit(function (event) {
      event.preventDefault();
      // prepare data from form
      var data = $(this).serializeArray(); // convert form to array
      data.push({name:"idpost", value: localStorage.getItem("postid")});
      $.ajax({
        type: "POST",
        url: "./process/add-comment.php",
        data: $.param(data),
        dataType: "json",
        encode: true,
      }).done(function (response) {
          if(response.success){       
            $('#Dinamic-Comment-Section').html(response.comments);
            $('#comment-form textarea').val("");        
          }
      });
    });

    $(document).on('submit', '.reply-form', function(event){ 
      event.preventDefault(); 
      var data = $(this).serializeArray(); // convert form to array
      data.push({name:"idpost", value: localStorage.getItem("postid")});
      $.ajax({
        type: "POST",
        url: "./process/add-reply.php",
        data: $.param(data),
        dataType: "json",
        encode: true,
      }).done(function (response) {
          if(response.success){       
            $('#Dinamic-Comment-Section').html(response.comments);
          }
      });
    });
});


// Load table and pagination
function load_post(){
    // Define post id
    var id = parseInt(localStorage.getItem("postid"));
    $.ajax({  
      method:"POST",  
      url:"./process/create-post.php",  
      data:{id:id},  
      dataType: "json",
      encode: true,
    }).done(function (response) {
        if(response.success){
          // update content
          $('#Dinamic-Post').html(response.post);
          $('#Dinamic-Comment-Section').html(response.comments);
        }
    });
  }  