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

// 1. Inicio //

function inicio(){
    $('#inicio h1').addClass('animated fadeInDown');
    $('#inicio p, #inicio button').addClass('animated fadeIn');
}

var opcion = -1;

/*
var time = 1;
var max  = 5;
var intervalTime;

function timeToShowCam()
{

    intervalTime = setInterval(function()
    {
        console.log(time+" dqw");

        if( time==max )
        {
            clearInterval(intervalTime);
            timer_video();                    
        }else{
            time++;
        }
        
    },1000);

}
*/

// 5. Contador de 10 segundos antes de comenzar a grabar //
var video = document.getElementById('video');
var video_time = 10;

function timer_video()
{

    if(video_time <= 0){
        video.pause();
        $('.timer').stop().animate({'opacity':'0'},300, function(){
            $(this).hide();
            // Muestro la webcam //
            webcam();
        });
    }else{
        video_time = video_time - 1;
        $('.timer h2').html(video_time);
        setTimeout(function(){
            timer_video();
        },1000);
    }
}        

function marcar_opcion(op)
{
	opcion = op;
}

function paso3()
{
        $('#seleccion, #connect').stop().animate({'opacity':'0'},300, function(){
            $(this).hide();
            setTimeout(function(){                
                activar.onclick();
            },1000);
        });
}

// * * * * * Front End Functions * * * * * //
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
        $('main').show().stop().animate({'opacity':'1'},300, function(){
            $('#home .logo-app').addClass('animated fadeInDown');
        });
        center();
        characters();
        cam();
        $('#preload').stop().animate({'opacity':'0'},300, function(){
            $(this).hide();
        });
    });
}


function center(){
    var height = $(window).height();
        $('.contenido').each(function(){
            
            var contain = $(this).height();

            $(this).css('marginTop', (height - contain)/2);
        
        });
}

function characters(){
    var logo = $('#seleccion .logo-app').height(),
        height = $(window).height();

        $('#seleccion .personaje').each(function(){
            $(this).css('height', height-(logo));
        });

        $('#seleccion .personajes').css('width',$('#seleccion .first').width()+$('#seleccion .second').width()+$('#seleccion .third').width()-100);
        $('#seleccion .second').css('marginLeft', -($('#seleccion .second').width()/2));
}


function cam(){
    var height = $(window).height();
    $('#webcam .cam').css('height', height-100);
    $('#webcam .cam').css('marginTop', -($('#webcam .cam').height()/2)); 
}

// * * * * * Flujo * * * * * //
// 1. Pasar del Home a Selección de Personajes //
$(document).on('click', '#home button', function(){
    characters();
    home();
});

function home(){
    $('#home').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
        $('#seleccion .logo-app').addClass('animated fadeInDown');
        $('#seleccion .first').addClass('animated fadeInLeft');
        $('#seleccion .second').addClass('animated fadeInUp');
        $('#seleccion .third').addClass('animated fadeInRight');
    });
}

// 2. Hover sobre un Personaje //
$(document).on('mouseenter', '#seleccion .first', function(){
    $(this).stop().animate({'left':'-20px', 'opacity':'1'},300, function(){
        $(this).css('zIndex','4');
        $(this).stop().animate({'left':'50px'},300);
    });
    $(this).siblings('.personaje').animate({'opacity':'.8'},300);

}).on('mouseleave', '#seleccion .first', function(){
    $(this).stop().animate({'left':'-20px'},300, function(){
        $(this).css('zIndex','2');
        $(this).stop().animate({'left':'50px'},300);
    });
});

$(document).on('mouseenter', '#seleccion .second', function(){
    $(this).stop().animate({'opacity':'1'},300);
    $(this).siblings('.personaje').animate({'opacity':'.8'},300);
}).on('mouseleave', '#seleccion .second', function(){

});

$(document).on('mouseenter', '#seleccion .third', function(){

    $(this).stop().animate({'right':'0px', 'opacity':'1'},300, function(){
        $(this).css('zIndex','4');
        $(this).stop().animate({'right':'50px'},300);
    });
    $(this).siblings('.personaje').animate({'opacity':'.8'},300);

}).on('mouseleave', '#seleccion .third', function(){
    $(this).stop().animate({'right':'0px'},300, function(){
        $(this).css('zIndex','2');
        $(this).stop().animate({'right':'50px'},300);
    });
});

// 3. Selección de un Personaje //
$(document).on('click', '#seleccion .personaje', function(){
    $(this).siblings('.personaje').addClass('animated fadeOutDown');
    $('#connect').show().stop().animate({'opacity':'1'},300);
});

// 4. Conectarse a Facebook //
/*
$(document).on('click', '#connect button', function(){

    // Una vez conectado //
    $('#seleccion, #connect').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
        setTimeout(function(){
            video.play();
            timer_video();
        },1000);
    });
});
*/

function webcam(){
    $('.web_cam').show().stop().animate({'opacity':'1'},300);
    record.onclick();
    //finish_record();
}

// 6. Termina de Grabar la webcam y muestro las opciones: Ver Video - Volver a grabar - Subir //
function finish_record(){
    $('.opciones').show().stop().animate({'opacity':'1'},300);
}

// ver video //
$(document).on('click', '.ver-video-btn', function(){
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

function fin()
{
    $("#loading").fadeIn();
    $.post('app/guardarVideo', { video: fileName, opcion:opcion }, function(data, textStatus, xhr) 
    {
        if( data==1 )
        {
            $("#loading").hide();
            $('#webcam').stop().animate({'opacity':'0'},300, function()
            {
                $(this).hide();
                preview_final.play();
                //localstream.getVideoTracks()[0].stop();

            }); 
        }                       
    });
}

function volver_a_grabar()
{

    opcion      = -1;
    fileName    = "";
    numero      = 1;
    videoActual = "";
                
    $('.web_cam').hide().stop().animate({'opacity':'0'},300);
    $("#archivo_nombre").val("");

    $("#preview-video-final .src-mp4,#video-final-tele .src-mp4").attr("src","");
    $("#preview-video-final .src-ogv,#video-final-tele .src-ogv").attr("src","");
    $("#preview-video-final .src-webm,#video-final-tele .src-webm").attr("src",""); 

    $("#preview-video-final").hide();

    $('.opciones').hide().stop().animate({'opacity':'0'},300);  
    
    $('.timer').show().animate({'opacity':'1'},300);              
    
}        

// 8. Ir a la galería //
$(document).on('click', '.galeria-btn', function(){
    galeria();
});

function galeria(){
    $('#final').stop().animate({'opacity':'0'},300, function(){
        $(this).hide();
    });
}

$(document).ready(function(){
    circle();
});

$(window).resize(function(){
    center();
    characters();
    cam();
});











