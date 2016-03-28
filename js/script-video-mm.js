
    var fileName;
	var index;

    var cont_video = 10;
    var inter_dies;    

    function captureUserMedia(mediaConstraints, successCallback, errorCallback){
        navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
    }

    var mediaConstraints = {
        audio: !IsChrome && !IsOpera && !IsEdge, // record both audio/video in Firefox
        video: true
    };

    var mediaRecorder;

    function onMediaSuccess(stream)
    {        

        $("#webcam h3,#webcam .botonera,.instrucciones").hide();
		
        preview = mergeProps(preview, {
            controls: false,
            muted: true,
            src: URL.createObjectURL(stream)
        });

        localstream = stream;
        preview.src = window.URL.createObjectURL(stream);
        preview.play();

        //video.play();

        //videosContainer.appendChild(video);

        mediaRecorder = new MediaStreamRecorder(stream);
        mediaRecorder.stream = stream;
        mediaRecorder.mimeType = 'video/webm';

        mediaRecorder.ondataavailable = function(blob) 
        {
		  if(index==0){
			  mediaRecorder.stop();
			  fileName = Math.round(Math.random() * 99999999) + 99999999;
			  PostBlob(blob, 'video', fileName + '.webm');
			  preview.pause();
			  index++;
              $("#volver-a-grabar").show();
		  }
        };

        $( "#subir-btn,#grabar-btn" ).prop( "disabled", true );
        $( "#subir-btn,#grabar-btn" ).addClass( "off" );

        counter();
        //play_video();                

        //$("#sube-video").hide();
        //accion_subir_grabar();
        $("#tipo").val("grabar");             
        
    }

    function onMediaError(e) {
        console.error('media error', e);
        $( "#subir-btn,#grabar-btn" ).prop( "disabled", false );
        $( "#subir-btn,#grabar-btn" ).removeClass( "off" );
        // alert(JSON.stringify(error));
        alert("Para continuar debe activar su camara web.");
        //location.href="./";        
    }

    var videosContainer = document.getElementById('videos-container');
    

    window.onbeforeunload = function() {
        //document.querySelector('#start-recording').disabled = false;
    };

    function PostBlob(blob, fileType, fileName)
    {
        
          $("#loading,.minutos").fadeIn();
          $("#reloj").html("");  
          $("#show_cam_black").hide();          

          
          // FormData
          var formData = new FormData();
          formData.append(fileType + '-filename', fileName);
          formData.append(fileType + '-blob', blob);

          xhr('app/subeVideo', formData, function(fileURL)
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

            $("#show_cam_black").show();

            $( "#subir-btn,#grabar-btn" ).prop( "disabled", false );
            $( "#subir-btn,#grabar-btn" ).removeClass("off");

            $("#grabar-btn").text("Volver a grabar");  
            $("#grabar-btn").attr("onclick","volver_a_grabar();");  

          });                  
        

    }

    function xhr(url, data, callback) 
    {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                callback(request.responseText); 
            }
        };
        request.open('POST', url);
        request.send(data);
    }

    var record = document.getElementById('btn-record');
    var activar = document.getElementById('btn-grabar');
    var stop = document.getElementById('stop');
    var audio = document.querySelector('audio');
    var recordVideo = document.getElementById('record-video');
    var preview = document.getElementById('preview-video');
    var preview_final = document.getElementById('video-final-tele');
    var previewFin = document.getElementById('preview-video-final');
    // if you want to record only audio on chrome
    // then simply set "isFirefox=true"
    var isFirefox = !!navigator.mozGetUserMedia;
    var recordAudio, recordVideo;
    var refreshIntervalId;

    var localstream = "";

    activar.onclick = function() {
        captureUserMedia(mediaConstraints, onMediaSuccess, onMediaError);
        index = 0;
    };

    record.onclick = function() 
    {

        $( "#subir-btn,#grabar-btn" ).prop( "disabled", true );

        var timeInterval = 10000;
        //var timeInterval = document.querySelector('#time-interval').value;
        if (timeInterval) timeInterval = parseInt(timeInterval);
        else timeInterval = 5 * 1000;

        // get blob after specific time interval
        mediaRecorder.start(timeInterval);

        inter_dies = setInterval(function()
        {
            if( cont_video>0 )
            {
                cont_video--;
                $(".web_cam h2").text(cont_video);
            }else{
                clearInterval(inter_dies); 
                $(".web_cam h2").hide();
            }
        },1000);

    };   

    function reproducir()
    {      
        preview_final.load();
        preview_final.currentTime = 0;
        preview_final.play();
    }

       




       