<?php  

    $obj =& get_instance();
    $obj->config->load('facebook');

	$config['appId'] = $obj->config->item('appId');
	$config['secret'] = $obj->config->item('secret');

	$config['RECEIVERFB'] = $obj->config->item('RECEIVERFB');
	$config['RECEIVERTW'] = $obj->config->item('RECEIVERTW');
	$config['URLPESTANA'] = $obj->config->item('URLPESTANA');
	$config['URLAPP']     = $obj->config->item('URLAPP');
	$config['BASEURL']    = $obj->config->item('BASEURL');
	$config['URLIMAGEFB'] = $obj->config->item('URLIMAGEFB');	

?>
<script>
	var appId      = "<?php echo $config['appId']?>";
	var secret     = "<?php echo $config['secret']?>";
	var RECEIVERFB = "<?php echo $config['RECEIVERFB']?>";
	var RECEIVERTW = "<?php echo $config['RECEIVERTW']?>";
	var URLPESTANA = "<?php echo $config['URLPESTANA']?>";
	var URLAPP     = "<?php echo $config['URLAPP']?>";
	var BASEURL    = "<?php echo $config['BASEURL']?>";
	var URLIMAGEFB = "<?php echo $config['URLIMAGEFB']?>";
</script>