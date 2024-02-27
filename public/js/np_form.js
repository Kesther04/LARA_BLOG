$(document).ready(function () {

    var mainCt =[
        {category:''},
        {category:'news'},
        {category:'lifestyle'},
        {category:'sports'},
        {category:'entertainment'},
        {category:'quizzes'},
        {category:'business'}
    ];

    var catna = $("#cat");


    $.each(mainCt, function (index, value) {
        var errr = '<option>'+value.category+'</option>';
        catna.append(errr); 
        
    });

    var catTyp = {
        news:['','politics','local','metro','global'],
        lifestyle:['','fashion','beauty&health','relationships&weddings','culture_related'],
        sports:['','sports'],
        entertainment:['','celebrities','music','movies'],
        quizzes:['','quizzes'],
        business:['','international','national']
    };

    
    $.each(catTyp, function (key, value) {
        
        $("#cat").change(function () {
            if ($("#cat").val() == key) {               
                $(".cat-typ").css({'display':'block'});
                var errn = ""; 
                $.each(value, function (index, val) {   
                    errn += '<option>'+val+'</option>';
                }); 
                $("#typ").empty();
                $("#typ").append(errn);         
            }
        });

    }); 

        
});


