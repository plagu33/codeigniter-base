<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Data_model'); 
	}




	public function analytics(){

		echo "hola";
	}




	public function json(){

		/*if("192.168.1.27"!=$this->input->ip_address()){
			$json->error = array("ip"=>$this->input->ip_address());	
			echo json_encode($json);
			die();
		}*/
			
			$registros = $this->Data_model->getCantRegistros();
			$reg_web = $this->Data_model->getRegistrosTipo("web");
			$reg_mob = $this->Data_model->getRegistrosTipo("mobile");
			$flujo = $this->Data_model->getInteracciones();
			$registrosDiarios = $this->Data_model->getCantRegistrosFecha();
			
			$json->data = array("registros"=>$registros,"interacciones"=>$flujo,"mobile"=>$reg_mob,"web"=>$reg_web,"estado"=>"activada","ip"=>$this->input->ip_address());
			$i=0;
			foreach ($registrosDiarios as $key ) {
				//$json->diario[$key->fecha] = $key->total; 
				$json->diario[$i]=array("fecha"=>$key->fecha,"total"=>$key->total,"web"=>$key->web,"mobile"=>$key->mobile);
				$i++;
			}


			echo json_encode($json);

	}

	public function exportar(){

		if("192.168.2.10"!=$this->input->ip_address()){
			die();
		}

		header('Content-type: application/vnd.ms-excel');
		header("Content-Disposition: attachment; filename=registros.xls");
		header("Pragma: no-cache");
		header("Expires: 0");

		?>
			<table align="center" width="800" border="1" style="border-collapse:collapse">
			<tr bgcolor="#CCCCCC">
			<td>ID</td>
			<td>Nombre</td>
			<td>Email</td>
			<td>Termino Flujo</td>
			<td>Origen</td>
			<td>Fecha</td>
			</tr>

				<?php
				$registros = $this->Data_model->getRegistros();
				foreach ($registros as $key ) {
						echo '<tr>';
						echo '<td>'.$key->id.'</td>';
						echo '<td>'.utf8_decode($key->nombre).'</td>';
						echo '<td>'.$key->email.'</td>';
						echo '<td>'.$key->flujo.'</td>';
						echo '<td>'.$key->tipo.'</td>';
						echo '<td>'.$key->fecha.'</td>';
						echo '</tr>';
					}
					?>
				</table>
		<?php

	}

}