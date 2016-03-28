<?php
	$this->_ci =& get_instance();
	$this->_ci->load->config('facebook');
	$config['URLAPP'] = $this->_ci->config->item('URLAPP');
?>	
<script>
	 top.parent.location.href = "<?php echo $config['URLAPP'];?>";

	
</script>