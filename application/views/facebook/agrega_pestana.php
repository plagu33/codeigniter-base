<?php  
	$this->_ci =& get_instance();
	$this->_ci->load->config('facebook');
	$config['appId']   = $this->_ci->config->item('appId');
	$config['BASEURL'] = $this->_ci->config->item('BASEURL');
?>	
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<body>
  <a href="javascript:void(0);" onclick=window.open("http://www.facebook.com/dialog/pagetab?app_id=<?php echo $config['appId']; ?>&redirect_uri=<?php echo $config['BASEURL'];?>","PageTab","width=800,height=300");>Click</a>
</body>
</html>