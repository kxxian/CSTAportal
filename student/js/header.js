$(document).ready(function() {

    setInterval(function() {

       //get enrollment status
       $.post("codes/header.php",
       {data1:'get'},function(data1){
           //console.log(data1);
            $(".enroll_status").text(data1);

               if($.trim(data1)=="Assessment"){
                  $(".enroll_status").css({"color": "#ffc107"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});

                  //STEP WIZARD 1
                  $("#not_enrolled").removeClass("current-item");
                  $("#not_enrolled_icon").removeClass("fa fa-fw fa-times");
                  $("#first_step").addClass("current-item");
                  $("#first_step_icon").addClass("fa fa-fw fa-sync")

               }else if($.trim(data1)=="Waiting Payment"){
                  $(".enroll_status").css({"color": "#ffc107"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});
                  

                  //STEP WIZARD 2
                  $("#not_enrolled").removeClass("current-item");
                  $("#first_step").removeClass("current-item");
                  $("#second_step").addClass("current-item");
                  $("#second_step_icon").addClass("fa fa-fw fa-sync")

               }else if($.trim(data1)=="Validating"){
                  $("#not_enrolled").removeClass("current-item");
                  $(".enroll_status").css({"color": "#ffc107"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrolldetails").css({"pointer-events": "none", "opacity": "0.6"});

                  //STEP WIZARD 3
                  $("#not_enrolled").removeClass("current-item");
                  $("#first_step").removeClass("current-item");
                  $("#second_step").removeClass("current-item");
                  
                  $("#third_step").addClass("current-item");
                  $("#third_step_icon").addClass("fa fa-fw fa-sync")

               }else if($.trim(data1)=="Enrolled"){
                  $(".enroll_status").css({"color": "lime"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrolldetails").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#validation").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrollvaldetails").css({"pointer-events": "none", "opacity": "0.6"});

                  //STEP WIZARD 4
                  $("#not_enrolled").removeClass("current-item");
                  $("#first_step").removeClass("current-item");
                  $("#second_step").removeClass("current-item");
                  $("#third_step").removeClass("current-item");
                   $("#fourth_step").removeClass("current-item");
                

               }
               
               else if($.trim(data1)=="Not Enrolled"){
                  $(".enroll_status").css({"color": "red"});
                  
                  $("#not_enrolled").addClass("current-item");
                  $("#not_enrolled_icon").addClass("fa fa-fw fa-times");
               }
       });


   

    },500);
    

});