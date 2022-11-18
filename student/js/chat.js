$(document).ready(function() {
   function fetch_user(){
    $.ajax({
        url:"../codes/chat.php",
        method:"POST",
        success: function(data){
            $('#user_details').html(data);
        }

    })
   }


});