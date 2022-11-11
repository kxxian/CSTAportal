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

                  //disable enrollment tab
                  $("#enroll_tab").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enroll_content").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrollvaldetails").css({"pointer-events": "none", "opacity": "0.6"});
                 
                  //STEP WIZARD 1
                  $("#application").addClass("completed")
                  $("#assessment").removeClass("completed")
                  $("#payment").removeClass("completed")
                  $("#validate").removeClass("completed")
                  $("#enrolled").removeClass("completed")

               }else if($.trim(data1)=="Waiting Payment"){
                  $(".enroll_status").css({"color": "#ffc107"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});

                   //enable enrollment tab
                   $("#enroll_tab").css({"pointer-events": "auto", "opacity": "1"});
                   $("#enroll_content").css({"pointer-events": "auto", "opacity": "1"});
                   $("#enrollvaldetails").css({"pointer-events": "auto", "opacity": "1"});
                  

                  //STEP WIZARD 2
                  $("#application").addClass("completed")
                  $("#assessment").addClass("completed")
                  $("#payment").removeClass("completed")
                  $("#validate").removeClass("completed")
                  $("#enrolled").removeClass("completed")

               }else if($.trim(data1)=="Validating"){
                  $("#not_enrolled").removeClass("current-item");
                  $(".enroll_status").css({"color": "#ffc107"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrolldetails").css({"pointer-events": "none", "opacity": "0.6"});

                  //STEP WIZARD 3
                  $("#application").addClass("completed")
                  $("#assessment").addClass("completed")
                  $("#payment").addClass("completed")
                  $("#validate").removeClass("completed")
                  $("#enrolled").removeClass("completed")


                   //enable enrollment tab
                   $("#enroll_tab").css({"pointer-events": "auto", "opacity": "1"});
                   $("#enroll_content").css({"pointer-events": "auto", "opacity": "1"});
                   $("#enrollvaldetails").css({"pointer-events": "auto", "opacity": "1"});

               }else if($.trim(data1)=="Enrolled"){
                  $(".enroll_status").css({"color": "lime"});
                  $("#enrolldetails").css({"display":"block"});
                  $("#enroll_div").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrolldetails").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#validation").css({"pointer-events": "none", "opacity": "0.6"});
                  $("#enrollvaldetails").css({"pointer-events": "none", "opacity": "0.6"});

                  //STEP WIZARD 4
                  $("#application").addClass("completed")
                  $("#assessment").addClass("completed")
                  $("#payment").addClass("completed")
                  $("#validate").addClass("completed")
                  $("#enrolled").addClass("completed")
                

               }
               
               else if($.trim(data1)=="Not Enrolled"){
                  $(".enroll_status").css({"color": "red"});
                  $("#enroll_div").css({"pointer-events": "auto", "opacity": "1"});
                  $("#enrolldetails").css({"pointer-events": "auto", "opacity": "1"});
                  $("#validation").css({"pointer-events": "auto", "opacity": "1"});
                  $("#enrollvaldetails").css({"pointer-events": "auto", "opacity": "1"});

                   //disable enrollment tab
                   $("#enroll_tab").css({"pointer-events": "none", "opacity": "0.6"});
                   $("#enroll_content").css({"pointer-events": "none", "opacity": "0.6"});
                   $("#enrollvaldetails").css({"pointer-events": "none", "opacity": "0.6"});
                  


                    //STEP WIZARD 4
                    $("#application").removeClass("completed")
                    $("#assessment").removeClass("completed")
                    $("#payment").removeClass("completed")
                    $("#validate").removeClass("completed")
                    $("#enrolled").removeClass("completed")
               }
       });


   

    },500);
    

});