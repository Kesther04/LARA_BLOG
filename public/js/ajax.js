$(document).ready(function(){
    $(".repfm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../../posts/allrex',
            type:'post',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);            
                $(".aj-btn").on("click",function(){
                    $("#masag").css({'visibility':'hidden'});
                    $("#com-fil").load("#com-fil",function(){
                        $(".com-fil").css({'display':'block'});
                    });
                });
            }
            
        });    
    });

    $(".ajx-link").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../../posts/allrep',
            type:'POST',
            data:new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
            success: function(data) {
                $("#masag-con").css({'visibility':'visible'});
                $(".msa").slideDown(1000).html(data);            
                $(".aj-btn").click(function(){
                    $("#masag-con").css({'visibility':'hidden'});
                })
                $(".rep-btn").click(function(){
                    $("#masag-con").css({'visibility':'hidden'});
                })
            }
            
        });    
    });

    $(".comfm").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'../../../posts/allposts/backend_comm',
            type:'post',
            data:new FormData(this),
            dataType:'json',
            cache:false,
            contentType:false,
            processData:false,
            success: function(dat) {
                $("#masag").css({'visibility':'visible'});
                $(".msa").html(dat);            
                $(".aj-btn").on("click",function(){
                    $("#masag").css({'visibility':'hidden'});
                    $("#com-fil").load("#com-fil",function(){
                        $(".com-fil").css({'display':'block'});
                    });
                });
            }
            
        });    
    });



    
})
