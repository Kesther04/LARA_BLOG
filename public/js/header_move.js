
$(document).ready(function(){
    $(".peon").click(function(){
        $("#ctrl").slideDown(1000).css({'visibility':'visible'});
    });

    $(".losec").click(function(){
        $("#ctrl").slideUp(1000).css({'visibility':'hidden'});
    });

    $("#com-btn").click(function(){
       $(".com-fil").slideToggle(300).css({'display':'block'}); 
    });


    
   
    
                
});

