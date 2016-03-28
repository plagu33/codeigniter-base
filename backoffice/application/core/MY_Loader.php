<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader 
{

    public function template($template_name, $vars = array(),$type = "web" , $return = FALSE)
    {

        $content  = $this->view('header', $vars, $return);
        $content  = $this->view('menu', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('footer', $vars, $return);

        if ($return)
        {
            return $content;
        }
    }
    
}