<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sociales_model extends CI_Model {

	function __construct()
	{
		parent::__construct();	
		$this->load->database();	
	}

	public function saveTweets($screen_name,$profile_image_url,$text,$id_str,$username,$image,$type)
	{

		$query = $this->db->get_where( 'sociales', array('id_tweet' => $id_str, 'id_campana' => IDCAMPANA) );	

		if( $query->num_rows()==0 )
		{

			$data = array( 'usuario'        => "@".$screen_name,
						   'imagen_usuario' => $profile_image_url,
						   'texto'          => $text,					    
						   'tipo'           => $type,
						   'id_tweet'       => $id_str,
						   'nombre_usuario' => $username,
						   'url_imagen'     => $image,
						   'estado'         => 0,
						   'origen'         => "tw",
						   'id_campana'     => IDCAMPANA
						 );												

			if( $this->db->insert('sociales', $data) )
			{
				return 1;
			}else{
				return 2;
			}

		}else{
			return 0;
		}

	}

	public function saveInstagram($image,$username,$texto,$profile_image_url,$usuario,$type)
	{

		$query = $this->db->get_where( 'sociales', array('url_imagen' => $image, 'id_campana' => IDCAMPANA) );	
		
		if( $query->num_rows()==0 )
		{

			$data = array( 'usuario'        => "@".$username,
						   'imagen_usuario' => $profile_image_url,
						   'texto'          => $texto,					    
						   'tipo'           => $type,
						   'nombre_usuario' => $usuario,
						   'url_imagen'     => $image,
						   'estado'         => 0,
						   'origen'         => "inst",
						   'id_campana'     => IDCAMPANA
						 );												

			if( $this->db->insert('sociales', $data) )
			{
				return 1;
			}else{
				return 2;
			}

		}else{
			return 0;
		}

	}		
		
}
?>