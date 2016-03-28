<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe extends CI_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->model('App_model','model');
      $this->load->library('phpmailer/phpmailer');
    }

    public function enviar()
    {

        $body = file_get_contents_curl(base_url()."mail-informes/mail.html");

        $nombre_campana     = "Virutex - Easy Gym";
        $registros_totales  = $this->db->get('registros')->num_rows();
        $registros_web      = $this->db->get_where('registros', array('reg_origen' => "web") )->num_rows();
        $registros_mobile   = $this->db->get_where('registros', array('reg_origen' => "mobile") )->num_rows();     

        $videos_total       = $this->db->get('videos')->num_rows();

        $html = '<tr>
                    <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>Campaña:</strong></td>
                    <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$nombre_campana.'</td>
                 </tr>
                 <tr>
                    <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>Registrados Totales:</strong></td>
                    <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$registros_totales.'</td>
                 </tr>
                 <tr>
                    <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>Registrados Totales Web:</strong></td>
                    <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$registros_web.'</td>
                 </tr>
                 <tr>
                    <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>Registrados Totales Mobile:</strong></td>
                    <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$registros_mobile.'</td>
                 </tr>
                 <tr>
                    <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>Videos totales:</strong></td>
                    <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$videos_total.'</td>
                 </tr>';    

        $body = str_replace('{DATOSBASICOS}',$html, $body);
        $body = str_replace('{BASE}',base_url(), $body);

        $query = $this->db->query("SELECT reg_fecha as reg_fecha, COUNT(1) AS cuantos FROM registros GROUP BY left(reg_fecha,10) ORDER BY reg_fecha DESC");

        if( $query->num_rows()>0 )
        {
            $i = 0;
            foreach ($query->result() as $row)
            {
                $fecha = explode(" ",$row->reg_fecha);
                if( $i==0 )
                {
                    $html = '<tr>
                                 <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>'.$fecha[0].'</strong></td>
                                 <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$row->cuantos.'</td>
                             </tr>';
                     $i++;  
                                                        
                }else{
                        $html .= '<tr>
                                      <td width="284" bgcolor="#ccc" style="padding:5px 10px; color: #616161; font-family: Helvetica, Arial, sans-serif; font-size: 13px;"><strong>'.$fecha[0].'</strong></td>
                                      <td width="284" style="padding: 5px 10px; color:#616161;font-family: Helvetica, Arial, sans-serif; font-size: 13px;">'.$row->cuantos.'</td>
                                  </tr>';                       
                }
               
            }    
        }            
                             
        $body = str_replace('{REGISTROSDIARIOS}',$html, $body);     

        //sendMailInforme("mmerino@digitaria.cl,hmunoz@digitaria.cl,sconejeros@digitaria.cl,mcaravantes@digitaria.cl","","","Reporte ".$nombre_campana,$body);
        sendMailInforme("mmerino@digitaria.cl","","","Reporte ".$nombre_campana,$body);        

        echo $body; 

    }

}


