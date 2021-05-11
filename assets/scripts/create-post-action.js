$(document).ready(function () {
  // Create Post
  $("#create-post").submit(function (event) {
    event.preventDefault();
    // prepare data from form
    //var addform = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./process/add-post.php",
      data: new FormData(this), // important
      contentType: false, // important
      processData: false, // important
      dataType: "json",
      encode: true,
    }).done(function (response) {
      if(response.success){       
        // show error message
        localStorage.setItem("postid", response.postid)
        $('#ModalSuccess').modal('show');
        $('#alert_message_success').html(response.message);
        setTimeout(function(){
          window.location.replace("./post.php");
        }, 2000);//wait 2 seconds
      }else{
        $('#ModalError').modal('show');
        $('#alert_message_error').html(response.message);
      }
    });
  });
});