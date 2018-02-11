$(document).ready(function(){
    $("#email").focusout(function(){
      var email = $(this).val();//pairnei thn timh tou email
      $.ajax({
        method: "POST",
        url: "../php/ajax/checkmail.php",
        data: { email: email}
        })
        .done(function( msg ) {
          if(msg == "ok"){
            if($('#email_text').hasClass('text-danger')){
                $('#email_text').removeClass('text-danger');
            }
            $('#email_text').addClass('text-success');
            $('#email_text').html('Το email είναι διαθέσιμο!');
          }else{
            if($('#email_text').hasClass('text-success')){
                $('#email_text').removeClass('text-success');
            }
            $('#email_text').addClass('text-danger');
            $('#email_text').html('Το email δεν είναι διαθέσιμο!');
          }

        });
    });
});
