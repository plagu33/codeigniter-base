
        numero = 10;

        // todo:Need to rewrite this entire experiment
        // 1) to support Microsoft Edge
        // 2) to support audio+screen capturing in Firefox
        // 3) to support audio-only recording in Firefox
        // etc.
        // todo: NEED to use "initRecorder" to get maximum accuracy in the audio/video lengths
        // need to playback recordings only after uploading both blobs.
        function captureUserMedia(mediaConstraints, successCallback, errorCallback)
        {
            navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
        }
        // PostBlob method uses XHR2 and FormData to submit 
        // recorded blob to the PHP server
        function PostBlob(blob, fileType, fileName)
        {
            // FormData
            var formData = new FormData();
            formData.append(fileType + '-filename', fileName);
            formData.append(fileType + '-blob', blob);
            // progress-bar
            var hr = document.createElement('hr');
            //container.appendChild(hr);
            var strong = document.createElement('strong');  
            strong.id = 'percentage';
            strong.innerHTML = fileType + ' upload progress: ';
            container.appendChild(strong);
            var progress = document.createElement('progress');
            container.appendChild(progress);
            $("#loading").fadeIn();
            $("#reloj").html("");
            
            // POST the Blob using XHR2
            xhr('app/subeVideo', formData, progress, percentage, function(fileURL)
            {
                
                if(fileURL!="")
                {
                    videoActual = fileURL;
                    $("#archivo_nombre").val(fileURL);                
                    var file = $("#archivo_nombre").val();
                    var tipo = $("#tipo").val(opcion);          
                    $("#loading").hide();            
                    //preview.src = fileURL;

                    $("#preview-video-final .src-mp4,#video-final-tele .src-mp4").attr("src",fileURL+".mp4");
                    $("#preview-video-final .src-ogv,#video-final-tele .src-ogv").attr("src",fileURL+".ogv");
                    $("#preview-video-final .src-webm,#video-final-tele .src-webm").attr("src",fileURL+".webm");                  

                    finish();

                    $("#preview-video").hide();
                    $("#preview-video-final").show();

                    preview_final.load();
                    previewFin.load();

                }

            });

        }

        var record = document.getElementById('btn-record');
        var activar = document.getElementById('btn-grabar');
        var stop = document.getElementById('stop');
        var deleteFiles = document.getElementById('delete');
        var audio = document.querySelector('audio');
        var recordVideo = document.getElementById('record-video');
        var preview = document.getElementById('preview-video');
        var preview_final = document.getElementById('video-final-tele');
        var previewFin = document.getElementById('preview-video-final');
        var container = document.getElementById('container');
        // if you want to record only audio on chrome
        // then simply set "isFirefox=true"
        var isFirefox = !!navigator.mozGetUserMedia;
        var recordAudio, recordVideo;
        var refreshIntervalId;

        var localstream = "";

        activar.onclick = function() {

            captureUserMedia({
                audio: true,
                video: true
            }, function(stream) {

                localstream = stream;
                preview.src = window.URL.createObjectURL(stream);
                preview.play();
                
                play_video();                

                //$("#sube-video").hide();
                //accion_subir_grabar();
                $("#tipo").val("grabar");     

                }, function(error) {
                    // alert(JSON.stringify(error));
                    alert("Para continuar debe activar su camara web.");
                    location.href="./";
            });

        };

        record.onclick = function() 
        {

            if( $("#btn-record").attr('disabled')!="disabled" )
            {
           
                    recordAudio = RecordRTC(localstream, {
                        //bufferSize: 16384,
                        //sampleRate: 45000,
                        onAudioProcessStarted: function() {
                            if (!isFirefox && webrtcDetectedBrowser !== 'edge') {
                                recordVideo.startRecording();
                            }
                        }
                    });

                    refreshIntervalId = setInterval("reloj()",1000);

                    if (isFirefox) {
                        recordAudio.startRecording();
                    }
                    if (!isFirefox && webrtcDetectedBrowser !== 'edge') {
                        recordVideo = RecordRTC(localstream, {
                            type: 'video'
                        });
                        recordAudio.startRecording();
                    }
                    //stop.disabled = false;

            }

        };   

        var fileName;
        //stop.onclick = function() {
        
        function reloj()
        {
            numero = numero-1;
            if(numero<0){
                nueva();
                clearInterval(refreshIntervalId);
            }else{
               $("#reloj").html(numero); 
               console.log(numero);
            }    
        }

        function nueva() 
        {
            
            //preview.src = '';
            preview.pause();
            fileName = Math.round(Math.random() * 99999999) + 99999999;

            if (!isFirefox) {
                recordAudio.stopRecording(function() {
                    PostBlob(recordAudio.getBlob(), 'audio', fileName + '.wav');
                });
            } else {
                recordAudio.stopRecording(function(url) {
                    preview.src = url;
                    PostBlob(recordAudio.getBlob(), 'video', fileName + '.webm');
                });
            }
            if (!isFirefox && webrtcDetectedBrowser !== 'edge') {
                recordVideo.stopRecording(function() {
                    PostBlob(recordVideo.getBlob(), 'video', fileName + '.webm');
                });
            } 
            
        };
       
        function xhr(url, data, progress, percentage, callback) 
        {
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    callback(request.responseText); 
                }
            };
            if (url.indexOf('delete.php') == -1) {
                request.upload.onloadstart = function() {
                    percentage.innerHTML = 'Upload started...';
                };
                request.upload.onprogress = function(event) {
                    progress.max = event.total;
                    progress.value = event.loaded;
                    percentage.innerHTML = ' ' + Math.round(event.loaded / event.total * 100) + "%";

                    console.log(Math.round(event.loaded / event.total * 100) + "%");
                };
                request.upload.onload = function() {
                    
                };
            }
            request.open('POST', url);
            request.send(data);
        }

        window.onbeforeunload = function() 
        {
            if (!!fileName) {

            }
        };
       




       