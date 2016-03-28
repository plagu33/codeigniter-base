<!doctype html>
<html lang="es">
<head>

	<meta charset="utf-8">

	<title><?php echo TITLE." | ".$title; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="expires" content="wed, 30 jul 2014 14:30:00 GMT">

	<meta name="description" content="<?php echo DESCRIPTION;?>" />	

	<!-- Open Graph data -->
	<meta property="og:title" content="<?php echo FACEBOOK_TITLE;?>" />
	<meta property="og:type" content="<?php echo FACEBOOK_TYPE;?>" />
	<meta property="og:url" content="<?php echo FACEBOOK_URL;?>" />
	<meta property="og:image" content="<?php echo FACEBOOK_IMAGE;?>" />
	<meta property="og:description" content="<?php echo FACEBOOK_DESCRIPTION;?>" />
		
	<link rel="icon" href="<? echo base_url()?>/img/favicon.png" type="image/png">
	
	<?php echo link_tag('css/style-ci.css'); ?>
	<?php echo link_tag('css/animate.css'); ?>
    <?php echo link_tag('css/bootstrap.min.css'); ?>
	<?php echo link_tag('css/styles.css'); ?>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-42748953-29', 'auto');
	  ga('send', 'pageview');
	</script>	

	<script src="<?php echo base_url();?>js/jquery.js"></script>		

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php $this->load->helper('fbinit_helper'); ?>	
		
</head>
<body>

<img src="<?php echo base_url();?>images/loading.gif" height="50" width="50" id="loading" class="loading centered" >

<h3 class="logo-virutex">Virutex</h3>

<a href="./" class="btn-home">Home</a>
<a href="javascript:void(0);" class="btn-productos open-productos">Ver Productos</a>
<a href="javascript:void(0);" class="btn-productos close-productos">Ver Productos</a>
<a href="https://play.spotify.com/user/somosvirutex" class="btn-spotify hidden-xs" target="_blank">Spotify</a>
<!-- Preload -->
<div id="preload">
  <div id="circle"></div>
</div>




