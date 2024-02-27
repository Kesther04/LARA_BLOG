$(document).ready(function () {
    
    var md = $(".dashboard");
    $('#peon').click(function(){
        md.slideDown(1000).css({'visibility':'visible'});
    })

    $('#losec').click(function(){
        md.slideUp(1000).css({'visibility':'hidden'});
    })
})