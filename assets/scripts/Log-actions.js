$(document).ready(function () {
    // Sing In
    $("#singin-form").submit(function (event) {
      event.preventDefault();
      // prepare data from form
      var addform = $(this).serialize();
      $.ajax({
        type: "POST",
        url: "./sings/singin-process.php",
        data: addform,
        dataType: "json",
        encode: true,
      }).done(function (response) {
          if(response.success){       
            window.location.replace("./home.php");
          }else{
            // show error message
            $('#ModalError').modal('show');
            $('#alert_message_error').html(response.message);
          }
      });
    });
  // Sing Up
  $("#singup-form").submit(function (event) {
    event.preventDefault();
    // prepare data from form
    var addform = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./sings/singup-process.php",
      data: addform,
      dataType: "json",
      encode: true,
    }).done(function (response) {
        if(response.success){       
          window.location.replace("./home.php");
        }else{
          // show error message
          $('#ModalError').modal('show');
          $('#alert_message_error').html(response.message);
        }
    });
  });
});


