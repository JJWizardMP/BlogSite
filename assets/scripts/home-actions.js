$(document).ready(function () {
    load_section();
    // load page to post action
    $(document).on('click', '.post', function(){  
        var idpost = $(this).attr("data-id");  
        localStorage.setItem('postid', idpost);
        window.location.replace("./post.php")
    });
    // load pagination
    $(document).on('click', '.pag', function(){  
        var idpag = $(this).attr("data-id");  
        load_section(idpag);
    });
});

  // Load posts section and pagination
function load_section(page){
    $.ajax({  
      method:"POST",  
      url:"./process/pagination.php",  
      data:{page:page},  
      dataType: "json",
      encode: true,
    }).done(function (response) {
        if(response.success){
          // update content
          $('#Dinamic-Section').html(response.section);
          $('#Dinamic-Pager').html(response.pager);
        }
    });
  }  