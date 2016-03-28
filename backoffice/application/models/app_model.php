<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getCountRegistros($tipo)
	{

		if( $tipo=="all" )
		{
			$cantidad = $this->db->count_all_results('registros');
		}
		if( $tipo=="web" )
		{
			$this->db->where('reg_origen','web');
			$this->db->from('registros');
			$cantidad = $this->db->count_all_results();
		}
		if( $tipo=="mobile" )
		{
			$this->db->where('reg_origen','mobile');
			$this->db->from('registros');
			$cantidad = $this->db->count_all_results();
		}

		return $cantidad;

	}

	public function getRegistros($tipo)
	{

		if( $tipo=="todos" )
		{
			$this->db->select("*");
			$this->db->from("registros");
			$this->db->order_by("reg_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;
		}
		if( $tipo=="web" )
		{
			$this->db->select("*");
			$this->db->from("registros");
			$this->db->where('reg_origen','web');
			$this->db->order_by("reg_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;						
		}
		if( $tipo=="mobile" )
		{
			$this->db->select("*");
			$this->db->from("registros");
			$this->db->where('reg_origen','mobile');
			$this->db->order_by("reg_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;				
		}

	}

	public function getMensajes($tipo)
	{

		if( $tipo=="todos" )
		{
			$this->db->select("*");
			$this->db->from("sociales_mensajes");
			$this->db->order_by("soc_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;
		}
		if( $tipo=="web" )
		{
			$this->db->select("*");
			$this->db->from("sociales_mensajes");
			$this->db->where('soc_origen','web');
			$this->db->order_by("soc_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;						
		}
		if( $tipo=="mobile" )
		{
			$this->db->select("*");
			$this->db->from("sociales_mensajes");
			$this->db->where('soc_origen','mobile');
			$this->db->order_by("soc_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;				
		}
		if( $tipo=="instagram" )
		{
			$this->db->select("*");
			$this->db->from("sociales_mensajes");
			$this->db->where('soc_origen','inst');
			$this->db->order_by("soc_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;						
		}
		if( $tipo=="twitter" )
		{
			$this->db->select("*");
			$this->db->from("sociales_mensajes");
			$this->db->where('soc_origen','tw');
			$this->db->order_by("soc_id","desc");
			$consulta = $this->db->get()->result();
			return $consulta;				
		}		

	}	

	public function getVideos()
	{
		$this->db->select("*");
		$this->db->from("videos");
		$this->db->order_by("vid_id","desc");
		$consulta = $this->db->get()->result();
		return $consulta;			
	}

}
?>
