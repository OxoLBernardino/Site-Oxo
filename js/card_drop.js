function clique(img){
    var modal = document.getElementById('janelaModal');
    var modalImg = document.getElementById("imgModal");
    var captionTexto = document.getElementById("txtImg");
    var btFechar = document.getElementsByClassName("fechar")[0];

    modal.style.display="block";
    modalImg.src=img.src;
    modalImg.alt=img.alt;
    captionTexto.innerHTML=img.alt;

    btFechar.onclick=function(){
        modal.style.display="none";
    };
}

$(document).ready(function(){
            $("#cnpj").mask("00.000.000/0000-00");
            $("#tel").mask("(00) 0000-0000");
            $("#cel").mask("(00) 00000-0000");
            $("#insest").mask("000.000.000.000");
        });
        

$(document).ready(function(){
    $("#menub1,#menub2,#menub3,#menub4,#menub5,#menub6,#menub7").css("visibility","hidden");
    $("#menua1").click(function(){
        $("#menub1").css("visibility","visible");
        $("#menub2").css("visibility","hidden");
        $("#menub3").css("visibility","hidden");
        $("#menub4").css("visibility","hidden");
        $("#menub5").css("visibility","hidden");
        $("#menub6").css("visibility","hidden");
        $("#menub7").css("visibility","hidden");
    });
    $("#menua2").click(function(){
        $("#menub2").css("visibility","visible");
        $("#menub3").css("visibility","hidden");
        $("#menub4").css("visibility","hidden");
        $("#menub5").css("visibility","hidden");
        $("#menub6").css("visibility","hidden");
        $("#menub7").css("visibility","hidden");
        $("#menub1").css("visibility","hidden");
    });
    $("#menua3").click(function(){
        $("#menub3").css("visibility","visible");
        $("#menub4").css("visibility","hidden");
        $("#menub5").css("visibility","hidden");
        $("#menub6").css("visibility","hidden");
        $("#menub7").css("visibility","hidden");
        $("#menub1").css("visibility","hidden");
        $("#menub2").css("visibility","hidden");
    });
    $("#menua4").click(function(){
        $("#menub4").css("visibility","visible");
        $("#menub5").css("visibility","hidden");
        $("#menub6").css("visibility","hidden");
        $("#menub7").css("visibility","hidden");
        $("#menub1").css("visibility","hidden");
        $("#menub2").css("visibility","hidden");
        $("#menub3").css("visibility","hidden");
    });
    $("#menua5").click(function(){
        $("#menub5").css("visibility","visible");
        $("#menub6").css("visibility","hidden");
        $("#menub7").css("visibility","hidden");
        $("#menub1").css("visibility","hidden");
        $("#menub2").css("visibility","hidden");
        $("#menub3").css("visibility","hidden");
        $("#menub4").css("visibility","hidden");
    });
    $("#menua6").click(function(){
        $("#menub6").css("visibility","visible");
        $("#menub7").css("visibility","hidden");
        $("#menub1").css("visibility","hidden");
        $("#menub2").css("visibility","hidden");
        $("#menub3").css("visibility","hidden");
        $("#menub4").css("visibility","hidden");
        $("#menub5").css("visibility","hidden");
    });
    $("#menua7").click(function(){
        $("#menub7").css("visibility","visible");
        $("#menub1").css("visibility","hidden");
        $("#menub2").css("visibility","hidden");
        $("#menub3").css("visibility","hidden");
        $("#menub4").css("visibility","hidden");
        $("#menub5").css("visibility","hidden");
        $("#menub6").css("visibility","hidden");
    });
    $("#menub1,#menub2,#menub3,#menub4,#menub5,#menub6,#menub7").mouseover(function(){
        $(this).css("visibility","visible");
        
    });
    $("#menub1,#menub2,#menub3,#menub4,#menub5,#menub6,#menub7").mouseout(function(){
        $(this).css("visibility","hidden");
        
    });
    
});

