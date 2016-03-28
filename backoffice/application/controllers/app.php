<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('App_model','model');
		$this->load->library('facebook');
	}

	public function index()
	{
		$data['title']  = "Inicio";
		$data['total']  = $this->model->getCountRegistros("all");
		$data['mobile'] = $this->model->getCountRegistros("mobile");
		$data['web']    = $this->model->getCountRegistros("web");
		$this->load->template('home',$data);
	}

	public function registros()
	{

		$tipo = $this->uri->segment(2);

		$registros = $this->model->getRegistros($tipo);

		if( $tipo=="todos" )
		{
			$titulo = "Registros";
		}
		if( $tipo=="web" )
		{
			$titulo = "Registros web";
		}
		if( $tipo=="mobile" )
		{
			$titulo = "Registros mobile";
		}
		$data['title']  = "Registros";
		$data['titulo'] = $titulo ;
		$data['registros'] = $registros ;
		$this->load->template('registros',$data);

	}

	public function videos()
	{
		$data['title']  = "Videos";
		$data['titulo']  = "Videos";	
		$data['videos']  = $this->model->getVideos();
		$this->load->template('videos',$data);		
	}

	public function cambiarEstado()
	{

		$id     = $this->input->post("id_video");
		$estado =  $this->input->post("estado");

		$data = array('vid_estado' => $estado);

		$this->db->where('vid_id', $id);
		$this->db->update('videos', $data); 		

	}

}







