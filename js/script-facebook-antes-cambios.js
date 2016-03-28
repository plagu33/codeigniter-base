jQuery(document).ready(function($)
{
	jQuery('body').prepend('<div id="fb-root"></div>');
	window.fbAsyncInit = function()
	{
			FB.init({
				appId   : appId,
				version : 'v2.0',
				status  : true,
				cookie  : true,
				xfbml   : true
		    });		    
		    afterInit();
	};
	(function(){ var e = document.createElement('script'); e.async = true; e.src = document.location.protocol + '//connect.facebook.net/es_ES/sdk.js'; document.getElementById('fb-root').appendChild(e); }());

});  

function afterInit()
{
	FB.getLoginStatus(function(response)
	{
		$("#connect-facebook").attr("onclick",'loginFB();');
	});	
}

function loginFB()
{

	$("#connect-facebook").hide();
	$("#loading").fadeIn();

	FB.login(function(response)
	{

	    if(response.authResponse)
	    {

	    	var idf = response.authResponse["userID"];       
             
			FB.api('/'+idf,function(response)
			{
				
				if( response["id"] )
				{

					$.post('isRegistered', { id: response.id,name:response.name }, function(data, textStatus, xhr)
					{
						if( data!="error" )
						{
							if( data==1 )
							{
								//registrado o ya registrado
								paso3();
							}else{
								//error
								//formulario_registro(response.name);
								//alert("error fb");
							}
						}
					});

					//$("#connect-facebook").fadeIn();
					$("#loading").hide();
		
				}else{
					//$("#connect-facebook").fadeIn();
					$("#loading").hide();
				}

			});

	    }else{ 
					//$("#connect-facebook").fadeIn();
					$("#loading").hide();
	    }

	},{ scope: 'email', auth_type: 'rerequest' });

}








function invitaAmigosFB() 
{
	FB.ui({method: 'apprequests',
    message: "Participa "/*,
	max_recipients:10*/
	}, requestCallback);
}

function requestCallback(response)
{

	if(response.to.length>0)
	{		

	}
	
}

function sharefb()
{

	FB.ui({
	method      : 'feed',
	link        : RECEIVERFB,
	picture     : URLIMAGEFB+'images/facebook/imagencompartir.jpg',
	name        : 'Easy gym', 
	caption     : 'Virutex',
	description : "Texto compartir"
	}, function(response){
		if( response!=null ){  }
	});
	
}

function sharetw()
{

    var w    = "626";
    var h    = "455";
    var left = (screen.width/2)-(w/2);
    var top  = (screen.height/2)-(h/2);
 
    var text = "¡Este fue mi regalo perfecto! Ya estoy participando por una Cámara Polaroid y por una de las 3 Gift Card navideñas."; 
    var url  = RECEIVERTW;
    window.open('https://twitter.com/share?count=none&text='+encodeURIComponent(text)+'&url='+encodeURIComponent(url),'', 'toolbar=0, status=0, width='+w+',height='+h+', top='+top+', left='+left);

}








