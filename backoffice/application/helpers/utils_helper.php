<?php 

function sendEmail($para, $cc ,$cco, $subject, $body)
{
    
    $obj =& get_instance();
    $obj->config->load('phpmailer');

    $config['mode']      = $obj->config->item('mode');
    $config['secure']    = $obj->config->item('secure');
    $config['host']      = $obj->config->item('host');
    $config['port']      = $obj->config->item('port');
    $config['email']     = $obj->config->item('email');
    $config['emailpwd']  = $obj->config->item('emailpwd');
    $config['emailfrom'] = $obj->config->item('emailfrom');
    $config['fromname']  = $obj->config->item('fromname');

    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->IsHTML($config['mode']); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = $config['secure']; // secure transfer enabled REQUIRED for GMail
    $mail->Host = $config['host'];
    $mail->Port = $config['port'];
    $mail->Username = $config['email'];  
    $mail->Password = $config['emailpwd'];        
    $mail->SetFrom($config['emailfrom'], $config['fromname']);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if( $para!="" ){
        $para = explode(",",$para);
        foreach($para as $key){
           $mail->AddAddress($key);
        }   
    }
    if( $cc!="" ){
        $cc = explode(",",$cc);
        foreach($cc as $key){
           $mail->AddCC($key);
        }               
    }
    if( $cco!="" ){
        $cco = explode(",",$cco);
        foreach($cco as $key){
           $mail->AddBCC($key);
        }               
    }
    
    if(!$mail->Send()) {
        $error = 'Mail error: '.$mail->ErrorInfo; 
    } else {
        $error = 1;
    }
    return $error;
}

function sendMailInforme($para,$cc,$cco,$subject,$body)
{



    $obj =& get_instance();
    $obj->config->load('phpmailer');

    $config['mode']      = $obj->config->item('mode');
    $config['secure']    = $obj->config->item('secure');
    $config['host']      = $obj->config->item('host');
    $config['port']      = $obj->config->item('port');
    $config['email']     = $obj->config->item('email');
    $config['emailpwd']  = $obj->config->item('emailpwd');
    $config['emailfrom'] = $obj->config->item('emailfrom');
    $config['fromname']  = $obj->config->item('fromname');

    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->IsHTML($config['mode']); // enable SMTP
    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = $config['secure']; // secure transfer enabled REQUIRED for GMail
    $mail->Host = $config['host'];
    $mail->Port = $config['port'];
    $mail->Username = $config['email'];  
    $mail->Password = $config['emailpwd'];        
    $mail->SetFrom($config['emailfrom'], $config['fromname']);
    $mail->Subject = $subject;

   // $mail->AddEmbeddedImage('mail-informes/images/imagen.jpg', 'imagen','imagen.jpg');

    $mail->Body = $body;

    if( $para!="" ){
        $para = explode(",",$para);
        foreach($para as $key){
           $mail->AddAddress($key);
        }   
    }
    if( $cc!="" ){
        $cc = explode(",",$cc);
        foreach($cc as $key){
           $mail->AddCC($key);
        }               
    }
    if( $cco!="" ){
        $cco = explode(",",$cco);
        foreach($cco as $key){
           $mail->AddBCC($key);
        }               
    }       

    if(!$mail->Send()){
        $error = 'Mail error: '.$mail->ErrorInfo; 
    }else{
        $error = 1;
    }
    return $error;

}   
	
function file_get_contents_curl($url) 
{
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // hacer curl regrese data
	curl_setopt($ch, CURLOPT_URL, $url);

	$data = curl_exec($ch);
	curl_close($ch);

	return $data;
}

?>