var uAg = navigator.userAgent.toLowerCase();
var isMobile = !!uAg.match(/android|iphone|ipad|ipod|blackberry|symbianos/i);

var music = document.getElementsByTagName("audio")[0];

function play_audio()
{
    music.play();
}

function stop_audio()
{
    music.pause();
    music.currentTime = 0;
}

var opcion = -1;

// 5. Contador de 10 segundos antes de comenzar a grabar //
var video = document.getElementById('video');
var contador  = 20;
var intro     = 10;

function counter()
{
    if(contador <= 10){
        // COMIENZA A GRABAR //
        record_video();        
    }
    else if(contador <= 20 && contador > 10)
    {
        contador--;
        intro--;
        $('.timer h2').html(intro);
        setTimeout(function(){
            counter();
        },1000);
    }else{
        contador--;
        intro--;
        setTimeout(function(){
            counter();
        },1000);
    }
}

function play_video(){
    video.play();
    counter();
}

function play_video_mobile(){
    video.play();
}

function record_video(){
    $('.timer').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
        $('#webcam .web_cam').show().stop().animate({'opacity':'1'},300);
        //COMIENZA A GRABAR ACÁ //
        record.onclick();
    });
}

function marcar_opcion(op)
{
    opcion = op;
    $("#video .src-mp4").attr("src","video/video"+op+".mp4");
    $("#video .src-ogv").attr("src","video/video"+op+".ogv");
    $("#video .src-webm").attr("src","video/video"+op+".webm");
    $("#video").attr("poster","video/poster"+op+".jpg");
    video.load();
}

function paso3()
{
    
    $('#conexion, #seleccion').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
        $('#webcam').show().stop().animate({'opacity':'1'},300, function()
        {
            
            var height = $(window).height();
            $('#webcam article').css('height', height-40);
            $('#webcam .cam').css('height', height-100);
            $('#webcam .cam').css('marginTop', -($('#webcam .cam').height()/2)); 
            $('#webcam .cam').addClass('animated fadeIn');
            
            setTimeout(function(){
                if( !isMobile ){
                    activar.onclick();
                }else{
                    play_video_mobile();
                }    
            },1000);
            
        });
    });    
   
}

/* * * * Funciones Front End * * * */
function main(){
    var height = $(window).height();
        $('main, section').css('min-height', height-40);
}

function center_vert(){
    var height = $(window).height();
        $('.center-vert').each(function(){
            $(this).css('marginTop', (height-$(this).height())/2);
        });
}

// Preload //

function circle(){
    $('#circle').circleProgress({
            value: 1,
            size: 100,
            animation: {
                duration: 2000
            },
            fill: {
                color: "#f2dac6"
            }
    }).on('circle-animation-end', function(){
        $('#inicio').show();
        center_vert();
        $('#circle').addClass('animated zoomOut');
        setTimeout(function(){
            $('#preload').hide();
            $('#inicio').stop().animate({'opacity':'1'},300, function(){
                inicio();
            });
        },300);
    });
}

// 1. Inicio //

function inicio(){
    $('#inicio h1').addClass('animated fadeInDown');
    $('#inicio p, #inicio button').addClass('animated fadeIn');
}

// * * * * * Flujo * * * * * //
// 1. Pasar del Home a Selección de Personajes //
$(document).on('click', '#inicio button', function(){
    init_seleccion();
    personajes();
});

// 2. Selección de Personajes //
function init_seleccion(){
    $('#inicio h1, #inicio p, #inicio button').removeClass('animated fadeInDown fadeIn').addClass('animated fadeOutUp');
    setTimeout(function(){
        $('#inicio').stop().animate({'opacity':'0'},300, function(){
            $(this).hide();
            $('#seleccion').show().stop().animate({'opacity':'1'},300, function(){
                $('#seleccion h2').addClass('animated fadeInDown');
                $('#seleccion .uno').addClass('animated fadeInUp');
                setTimeout(function(){
                   $('#seleccion .dos').addClass('animated fadeInUp'); 
                    setTimeout(function(){
                       $('#seleccion .tres').addClass('animated fadeInUp'); 
                    },200);
                },200);
            });
        });
    },300);
}

function personajes(){
    var height = $('#seleccion').height(),
        logo = $('#seleccion h2').height(),
        top = $('#seleccion h2').position();

        $('.personajes').css('height',height-logo+top.top);
}

$(document).on('mouseenter', '#seleccion .personaje', function(){
    $(this).removeClass('unselected');
    $(this).siblings('.personaje').addClass('unselected');
}).on('mouseleave', '#seleccion .personaje', function(){
    $('.personaje').removeClass('unselected');
});

// 2.1 Hover sobre un Personaje //

$(document).on('mouseenter', '#seleccion .uno', function(){
    $(this).stop().animate({'left':'-75px', 'opacity':'1'},300, function(){
        $(this).css('zIndex','4');
        $(this).stop().animate({'left':'0px'},300);
    });
    $(this).siblings('.personaje').animate({'opacity':'.8'},300);

}).on('mouseleave', '#seleccion .uno', function(){
    $(this).stop().animate({'left':'-75px'},300, function(){
        $(this).css('zIndex','2');
        $(this).stop().animate({'left':'0px'},300);
    });
});

$(document).on('mouseenter', '#seleccion .dos', function(){
    $(this).stop().animate({'opacity':'1'},300);
    $(this).siblings('.personaje').animate({'opacity':'.8'},300);
}).on('mouseleave', '#seleccion .dos', function(){

});

$(document).on('mouseenter', '#seleccion .tres', function(){

    $(this).stop().animate({'right':'-75px', 'opacity':'1'},300, function(){
        $(this).css('zIndex','4');
        $(this).stop().animate({'right':'0px'},300);
    });
    $(this).siblings('.personaje').animate({'opacity':'.8'},300);

}).on('mouseleave', '#seleccion .tres', function(){
    $(this).stop().animate({'right':'-75px'},300, function(){
        $(this).css('zIndex','2');
        $(this).stop().animate({'right':'0px'},300);
    });
});

// 2.2 Selección de un Personaje y Connect FB //

$(document).on('click', '.personajes .personaje', function(){
    $(this).siblings('.personaje').addClass('animated fadeOutDown');
    $('#conexion').show().stop().animate({'opacity':'1'},300);
});

function webcam(){
    $('.web_cam').show().stop().animate({'opacity':'1'},300);
    record.onclick();
    //finish_record();
}

// 6. Termina de Grabar la webcam y muestro las opciones: Ver Video - Volver a grabar - Subir //
function finish(){
    $('.opciones').show().stop().animate({'opacity':'1'},300);
    $('.web_cam').show().stop().animate({'opacity':'1'},300);
    stop_audio();
}

// ver video //
$(document).on('click', '.ver-video-btn', function(){
    play_audio();
    $('.opciones').hide();
    previewFin.play();
});

// volver a grabar //
$(document).on('click', '.volver-a-grabar-btn', function(){
    volver_a_grabar();
});

// 7. Subir un video //
$(document).on('click', '.subir-btn', function(){
    fin();
});           

// 8. Ir a la galería //
$(document).on('click', '.galeria-btn', function(){
    galeria();
});     

$(document).on('click', '#webcam .center-btn', function(){
    $('#mobile_form input[type="file"]').trigger('click');
});

function galeria(){
    $('#final').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
        $('#galeria').show();
        center_vert();
        $('#galeria').stop().animate({'opacity':'1'},300, function(){
            center_vert();
            setTimeout(function(){
                $('#galeria .televisor').addClass('animated fadeInDown');
            },500);
        });
    });
}

function fin()
{
    $("#loading").fadeIn();
    $.post('app/guardarVideo', { video: fileName, opcion:opcion }, function(data, textStatus, xhr) 
    {
        if( data==1 )
        {            
            $("#loading").hide();
            video_final();
        }                       
    });
}

function fin_mobile()
{
    $("#loading").fadeIn();
    $.post('app/guardarVideo', { video: fileName, opcion:opcion }, function(data, textStatus, xhr) 
    {
        if( data==1 )
        {            
            $("#loading").hide();

            $("#video-final-tele .src-mp4").attr("src","uploads/"+fileName+".mp4");
            $("#video-final-tele .src-ogv").attr("src","uploads/"+fileName+".ogv");
            $("#video-final-tele .src-webm").attr("src","uploads/"+fileName+".webm");     
            preview_final.load();
            video_final();
        }                       
    });
}

function volver_a_grabar()
{

    fileName    = "";
    numero      = 10;
    videoActual = "";
    contador    = 20;
    intro       = 10;

    $('.timer h2').html(10);
                
    $('.web_cam').hide().stop().animate({'opacity':'0'},300);
    $("#archivo_nombre").val("");

    $("#preview-video-final .src-mp4,#video-final-tele .src-mp4").attr("src","");
    $("#preview-video-final .src-ogv,#video-final-tele .src-ogv").attr("src","");
    $("#preview-video-final .src-webm,#video-final-tele .src-webm").attr("src","");     

    $('.opciones').hide().stop().animate({'opacity':'0'},300);  
    
    $('.timer').show().animate({'opacity':'1'},300);  

    $("#inicio,#seleccion,#conexion,#final").hide();
    $("#webcam").fadeIn();  
    
    $("#preview-video-final").hide();
    $("#preview-video").show();
    //preview.play();

    //play_video();              
    activar.onclick();
    
}    

function video_final()
{
    $('#webcam').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
        $('#final').show();
        center_vert();
        $('#final').stop().animate({'opacity':'1'},300, function(){
            center_vert();
            setTimeout(function(){
                $('#final .televisor').addClass('animated fadeInDown');
                preview_final.play();
            },500);
        });
    });
}    

$(document).ready(function()
{

    circle();
    main();
    center_vert();

    $("#submit_buscador").click(function(event) 
    {
        buscar();
    });

    $("#q").keyup(function(event){
        //13 = enter    
        if(event.keyCode == 13){
            buscar();
        }
    });    

});

$(window).resize(function(){
    main();
    center_vert();
});

function show_busqueda()
{
    $("#video-busqueda .src-mp4").attr("src","");
    $("#video-busqueda .src-ogv").attr("src","");
    $("#video-busqueda .src-webm").attr("src","");     

    $("#video-busqueda").hide();
    $("#resultados").show();    

    stop_audio();    
}

function buscar()
{
    var q = $("#q").val();

    if( q!="" && q.length>0 )
    {

        $("#resultados").html("");

        $('#resultados').show().stop().animate({'opacity':'1'},300);

        $.post('app/busqueda', { q: q }, function(data, textStatus, xhr) 
        {
            var datos = jQuery.parseJSON(data);        

            if( datos.length>0 )
            {
                $.each(datos, function( index, value ) 
                {

                    var array_nombre = value.nombre.split(" ");
                    var nombre = array_nombre[0]+" "+array_nombre[1];

                    var html = '<li onclick="show_video('+value.video+');" >'+
                                   '<figure><img height="40" width="40" src="'+value.avatar+'" alt="'+nombre+'"></figure>'+
                                   '<p>'+nombre+'</p>'+
                               '</li>';

                    $("#resultados").append(html);

                });  
            }else{

                var html = '<li>'+
                           '<p>Sin resultados</p>'+
                         '</li>';

                $("#resultados").append(html);
            }     

        });

    }
}

function show_video(param)
{

    $("#video-busqueda .src-mp4").attr("src","uploads/"+param+".mp4");
    $("#video-busqueda .src-ogv").attr("src","uploads/"+param+".ogv");
    $("#video-busqueda .src-webm").attr("src","uploads/"+param+".webm");     

    video_busqueda.load();

    $("#resultados").hide();
    $("#video-busqueda").show();

    play_audio();
    video_busqueda.play();    

}

function test()
{
    $("#inicio,#seleccion,#conexion,#webcam,#final").hide();
    galeria();
}

var video_busqueda = document.getElementById('video-busqueda');






