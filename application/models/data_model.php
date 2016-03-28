<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();		
	}

	
 

	public function getCantRegistros(){
			$query = $this->db->get_where( 'registros', array('id_campana' => IDCAMPANA) );
			return $query->num_rows();
	}

	public function getRegistrosTipo($tipo){
			$query = $this->db->get_where( 'registros', array('id_campana' => IDCAMPANA,'tipo'=> $tipo) );
			return $query->num_rows();
	}

	public function getInteracciones(){
			$query = $this->db->query( "SELECT distinct `id_facebook` FROM `colaciones` ");
			return $query->num_rows();
	}

	public function getCantRegistrosFecha(){
			$query = $this->db->query( "SELECT left(a.fecha,10) as fecha,COUNT(*) as total,(SELECT COUNT(*) FROM registros as b WHERE b.id_campana = '".IDCAMPANA."' and b.tipo='mobile' and left(a.fecha,10) = left(b.fecha,10)) as mobile,(SELECT COUNT(*) FROM registros as b WHERE b.id_campana = '".IDCAMPANA."' and b.tipo='web' and left(a.fecha,10) = left(b.fecha,10)) as web FROM registros as a WHERE a.id_campana = '".IDCAMPANA."' GROUP BY left(a.fecha,10) ORDER BY fecha DESC");
			return $query->result(); 
	}

	public function getRegistros(){
			$query = $this->db->query( "SELECT r.nombre,r.tipo,r.id,r.email,left(r.fecha,10) as fecha, CASE WHEN (SELECT count(1) FROM `colaciones` as c WHERE c.`id_facebook`= r.`id_facebook`) > 0  THEN 'SI'  ELSE 'NO' END AS flujo  FROM registros as r WHERE r.id_campana = '".IDCAMPANA."' ORDER BY fecha DESC");
			return $query->result(); 
	}


	


	


}
?>