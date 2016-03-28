<section id="productos">
  <div class="productos">
    <img src="images/productos.png" alt="" id="img-productos" usemap="#img-productos-map" width="1020" height="500">
  	<map name="img-productos-map" id="img-productos-map">
    <area id="p1" alt="" title="" href="javascript:void(0);" shape="poly" coords="214,93,283,124,289,256,200,273,196,279,162,254,159,112">
    <area id="p2" alt="" title="" href="javascript:void(0);" shape="poly" coords="277,68,299,254,406,237,390,60">
    <area id="p3" alt="" title="" href="javascript:void(0);" shape="poly" coords="415,50,421,237,440,235,471,278,485,271,486,167,500,156,500,51,477,41,449,37,427,42">
    <area id="p4" alt="" title="" href="javascript:void(0);" shape="poly" coords="488,166,489,308,549,329,552,188,554,177,561,167,536,156,516,154,495,159">
    <area id="p5" alt="" title="" href="javascript:void(0);" shape="poly" coords="554,174,553,328,621,345,624,188,630,177,616,165,589,164,569,165">
    <area id="p6" alt="" title="" href="javascript:void(0);" shape="poly" coords="625,329,625,185,647,174,669,172,686,174,704,184,702,208,696,358,626,345">
    <area id="p7" alt="" title="" href="javascript:void(0);" shape="poly" coords="703,194,696,357,776,371,788,199,770,185,738,183,719,183">
    <area id="p8" alt="" title="" href="javascript:void(0);" shape="poly" coords="198,276,238,380,276,388,445,356,468,305,484,311,484,299,459,257,440,236">
    <area id="p9" alt="" title="" href="javascript:void(0);" shape="poly" coords="465,305,451,353,416,408,475,425,741,487,760,478,771,428,794,376,784,371,756,372,549,330,492,317">
  </map>
  
  <span class="txt txt-1" id="p1-txt"><img src="images/p1.png" alt=""></span>
  <span class="txt txt-2" id="p2-txt"><img src="images/p2.png" alt=""></span>
  <span class="txt txt-3" id="p3-txt"><img src="images/p3.png" alt=""></span>
  <span class="txt txt-4" id="p4-txt"><img src="images/p4.png" alt=""></span>
  <span class="txt txt-5" id="p5-txt"><img src="images/p5.png" alt=""></span>
  <span class="txt txt-6" id="p6-txt"><img src="images/p6.png" alt=""></span>
  <span class="txt txt-7" id="p7-txt"><img src="images/p7.png" alt=""></span>
  <span class="txt txt-8" id="p8-txt"><img src="images/p8.png" alt=""></span>
  <span class="txt txt-9" id="p9-txt"><img src="images/p9.png" alt=""></span>
  </div>
  
</section>

<main>

  <audio src="<?php base_url(); ?>mp3/musica.mp3" preload="auto" style="display: none;" ></audio>

  <!-- 1. Inicio -->
  <section id="inicio" class="container">
    <article class="row">
      <div class="col-xs-12 center-vert">
        <h1 class="logo">Easy Gym by Virutex</h1>
        <p>En el Easy Gym de Virutex, te ejercitas mientras limpias tu casa. Elige al profesor que quieras, grábate haciendo ejercicio y participa. Por 1 de las 15 cuentas de Spotify Premium más un pack Easy Clean.</p>
        <button class="center-btn" >comenzar</button>
      </div>
    </article>
  </section>
  
  <!-- 2. Selección de Personaje -->
  <section id="seleccion" class="container">
    <article class="row">
      <div class="col-xs-12">
        <h2 class="logo">Easy Gym by Virutex</h2>
        <div class="personajes">
          <div class="personaje uno" onclick="marcar_opcion(1);" >
            <div class="nombre"><img src="images/nombre-novata.png" alt=""></div>
          </div>
          <div class="personaje dos" onclick="marcar_opcion(2);" >
            <div class="nombre"><img src="images/nombre-mantenedora.png" alt=""></div>
          </div>
          <div class="personaje tres" onclick="marcar_opcion(3);" >
            <div class="nombre"><img src="images/nombre-fugaz.png" alt=""></div>
          </div>
        </div>
      </div>
    </article>
  </section>

  <!-- 2.1 Conexión a Facebook -->
  <div id="conexion">
    <div class="center-vert">
      <span class="cerrar">X</span>
      <p>Conéctate con Facebook y prepárate para grabar tu mejor rutina de limpieza. Entre todos los que participen, sortearemos 15 cuentas de spotify premium más 1 pack easy clean.</p>
      <button class="center-btn" id="connect-facebook" >connect fb</button>
    </div>
  </div>

  <!-- intro -->
 <section id="intro">
   <div class="video-full">
      <video onended="continuar_btn();" id="video-intro" width="100%" height="100%" >
      <source class="src-webm" type="video/webm">
      <source class="src-mp4" type="video/mp4">            
      <!--source class="src-ogv" type="video/ogg"-->      
    </video>
    </div>
   <div class="botonera" id="botonera-instrucciones" >
      <button class="center-btn" id="btn-saltar" onclick="saltar();" >Saltar</button>
      <button class="center-btn hidden-xs" onclick="ver_otra_vez();" >Ver otra vez</button>
    </div>
  </section>

  <!-- 3. Webcam -->
  <section id="webcam" class="container">
    <div class="minutos" style="display:none;"><p>Esto puede demorar unos segundos...</p></div>
    <article class="row">
      <div class="instrucciones animated fadeInUp">
        <h3>¡Prepárate! Sólo tendrás 20 segundos para grabar tu rutina de limpieza.</h3>
        <div class="botonera">
          <button class="center-btn" id="grabar-btn" onclick="activar_camara();" >Grabar</button>
          <button class="center-btn" id="subir-btn" >Subir</button>
        </div>
        <!--div class="botonera">
          <button class="center-btn" onclick="volver_personajes();" >Volver</button>
        </div-->        
      </div>
      <div class="cam">

        <!--div class="col-xs-12 col-sm-6 video">
          <video id="video" width="100%" height="100%" muted poster="video/poster1.jpg" >
            <source class="src-mp4" src="" type="video/mp4">
            <source class="src-ogv" src="" type="video/ogg">
            <source class="src-webm" src="" type="video/webm">
          </video>
        </div-->

        <iframe width="0" height="0" frameborder="0" name="contenedor_subir_archivo" style="display: none"></iframe>  
        <form name="mobile_form" id="mobile_form" action="app/upload_file" method="post" enctype="multipart/form-data" target="contenedor_subir_archivo" class="visible-xs">
          <input type="file" name="mobile_video" id="mobile_video" accept="video/*" style="display:none;">
          <!--div class="center-btn" >cargar video</div-->
          <div class="errores" ></div>          
        </form>

        <div class="camara" id="show_cam_black" >

          <div class="timer">
            <h2>5</h2>
            <p>prepárate para grabar/subir tu rutina</p>
          </div>

          <div class="opciones">
            <ul>
            <li class="ver-video-btn hidden-xs ">ver video</li>
            <li class="volver-a-grabar-btn hidden-xs" id="volver-a-grabar" onclick="volver_a_grabar();" style="display: none;" >volver a grabar</li>
            <li class="volver-a-grabar-btn hidden-xs" id="volver-a-subir" onclick="volver_a_subir();" style="display: none;" >volver a subir</li>
            <li class="subir-btn">Finalizar</li>
            </ul>
          </div>

          <div class="web_cam">
            <video id="preview-video" style="height: 100%;width: 100%;" muted></video>
            <video onended="finish();" id="preview-video-final" style="height: 100%;width: 100%; display: none;" muted>
                <source class="src-webm" src="" type="video/webm">  
              	<source class="src-mp4" src="" type="video/mp4">                     
                <!--source class="src-ogv" src="" type="video/ogg"-->
            </video>
            <h2>10</h2>
          </div>

        </div>

      </div>
    </article>
    <a href="javascript:void(0);" id="btn-grabar" style="display: none;" >activar camara :D</a>
    <a href="javascript:void(0);" id="btn-record" style="display: none;" >grabar :D</a>
    <div id="container" style="padding:1em 2em; display:none;"></div>    
  </section>
  
 <!-- Video Final -->
 <section id="final" class="container">
    <article class="row">
      <div class="col-xs-12 center-vert">
        <div class="televisor">
          <img src="images/television.png" alt="" class="television">
          <div class="video">
            <video <?php if( $this->agent->is_mobile() ){ echo 'controls'; } ?> loop id="video-final-tele" muted style="height: 100%;width: 100%;" >
                <source class="src-webm" src="" type="video/webm"> 
                <source class="src-mp4" src="" type="video/mp4">                     
                <!--source class="src-ogv" src="" type="video/ogg"-->
            </video>                
          </div>
        </div>
        <p class="compartir-txt">Comparte el video para participar por 1 de las 15 cuentas de Spotify Premium más un pack Easy Clean.</p>
        <div class="botonera">
          <button class="center-btn" onclick="sharefb();" >compartir</button>
          <a class="center-btn visible-xs-block btn-spot" href="https://play.spotify.com/user/somosvirutex" target="_blank">Escucha la Playlist</a>
          <button class="center-btn galeria-btn">galería</button>
          <!--<button class="center-btn" id="click-video-final" onclick="preview_final.play();" >qwdqwd</button>-->
        </div>
      </div>
    </article>
 </section>
  
  <!-- Galería -->
  <section id="galeria" class="container">
    <article class="row">
      <div class="col-xs-12 center-vert">
        <div class="televisor">

          <ul class="resultados" id="resultados" ></ul>
          <img src="images/television.png" alt="" class="television">
          <div class="video">
            <!--div class="static"></div-->

            <video onended="show_busqueda();" id="video-busqueda" muted style="height: 100%;width: 100%;" >
              <source class="src-webm" src="" type="video/webm">    
              <source class="src-mp4" src="" type="video/mp4">                 
              <!--source class="src-ogv" src="" type="video/ogg"-->
            </video>   

          </div>

        </div>
        <div id="buscador_galeria" >
          <input type="text" name="q" id="q" placeholder="Escribe tu usuario de Facebook y encuéntrate">
          <div id="submit_buscador" ></div>
        </div>
      </div>  
    </article>
  </section>

</main>














