<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facebook extends CI_Controller 
{

	public function index()
	{
		$this->load->view('facebook/conf');
	}

	public function agrega_pestana()
	{
		$this->load->view('facebook/agrega_pestana');

	}

	public function direccionar()
	{
		$this->load->view('facebook/direccionar');

	}	

}
