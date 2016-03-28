<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model {

	function __construct()
	{
		parent::__construct();		
	}

	public function isRegistered($id_facebook,$nombre)
	{
		$this->db->select("*");
		$this->db->from("registros");
		$this->db->where("reg_id_facebook",$id_facebook);
		$cantidad = $this->db->count_all_results();
			
		$origen = "web";

		if( $this->agent->is_mobile() )
		{ 
			$origen = "mobile"; 
		}		

		if( $cantidad==0 )
		{
			//guardamos en db			
			$datos = array( 'reg_id_facebook' => $id_facebook, 
							'reg_nombre'      => $nombre,
							'reg_origen'      => $origen
						  );	

			if( $this->db->insert('registros', $datos) )
			{
				return 1;			
			}

		}else{
			return 1;
		}

	}

	public function guardarVideo($id_facebook,$nombre)
	{

		$video  = $this->input->post("video");
		$opcion = $this->input->post("opcion");		

		$datos = array( 'vid_id_facebook'  => $id_facebook, 
                        'vid_nombre'       => $nombre, 
                        'vid_url_avatar'   => "https://graph.facebook.com/".$id_facebook."/picture?type=square",
						'vid_nombre_video' => $video,
						'vid_opcion'       => $opcion );	

		if( $this->db->insert('videos', $datos) )
		{
			return 1;			
		}		

	}

	public function busqueda($q)
	{

		$this->db->select("vid_nombre as nombre,vid_url_avatar as avatar,vid_nombre_video as video");
		$this->db->from("videos");
		$this->db->like("vid_nombre",$q);
		$this->db->where('vid_estado',1);
		$this->db->order_by("vid_id","desc");
		$result = $this->db->get()->result();	

		return $result;	

	}	

}





?>