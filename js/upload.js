

$(document).ready(function()
{
	jQuery("#mobile_video").change(function()
	{
		jQuery("#mobile_form").submit();
		cargando();
	});		
});

function cargando()
{
	$(".web_cam h2").hide();
	$("#webcam h3,#webcam .botonera,.instrucciones").hide();
	//$(".volver-a-grabar-btn").hide();
	$( "#subir-btn,#grabar-btn" ).prop( "disabled", true );
	$( "#subir-btn,#grabar-btn" ).addClass("off");
	$("#show_cam_black").hide();
	$("#loading,.minutos").fadeIn();
	$("#mobile_form .center-btn").hide();
}

function sucess_upload(nombre_mobile)
{
	$(".web_cam h2").hide();
	$("#volver-a-subir").show();
	fileName = nombre_mobile;
	fileURL  = "uploads/"+nombre_mobile; 
    if(fileURL!="")
    {    	

        videoActual = fileURL;
        $("#archivo_nombre").val(fileURL);                
        var file = $("#archivo_nombre").val();
        var tipo = $("#tipo").val(opcion);          
        $("#loading,.minutos").hide();            
        //preview.src = fileURL;

        $("#preview-video-final .src-mp4,#video-final-tele .src-mp4").attr("src",fileURL+".mp4");
        /*
        	$("#preview-video-final .src-ogv,#video-final-tele .src-ogv").attr("src",fileURL+".ogv");
        */
        $("#preview-video-final .src-webm,#video-final-tele .src-webm").attr("src",fileURL+".webm");                  
        

        finish();

        $("#preview-video").hide();
        $("#preview-video-final").show();

        preview_final.load();
        previewFin.load();
        $(".timer").hide();
        $("#show_cam_black").show();

        $( "#subir-btn,#grabar-btn" ).prop( "disabled", false );
        $( "#subir-btn,#grabar-btn" ).removeClass("off");

        $( "#subir-btn" ).text("Volver a subir");

    }		
	//fin_mobile();
}

function error_upload(errors)
{
	$(".web_cam h2").hide();
	$("#volver-a-subir").show();
	//$(".volver-a-grabar-btn").show();	
	$( "#subir-btn,#grabar-btn" ).prop( "disabled", false );
	$( "#subir-btn,#grabar-btn" ).removeClass("off");

	$("#loading,.minutos").hide();
	$("#mobile_form .center-btn").show();

	if(errors=='The file you are attempting to upload is larger than the permitted size.')
	{
		status_upload = 0;
		//console.log(errors);
	}else if(errors=='The filetype you are attempting to upload is not allowed.')
	{
		status_upload = 0;
		//console.log(errors);
	}	

}




