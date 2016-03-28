<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('facebook');
		$this->load->model('App_model','model');
		$this->load->library('phpmailer/phpmailer');
		$this->load->library('user_agent'); 
	}

	public function index()
	{
		$data['title'] = "Home";
		$this->load->template('home',$data);		
	}

	public function isRegistered()
	{

		$id_facebook = $this->input->post("id");
		$nombre      = $this->input->post("name");

		if( $id_facebook )
		{
			echo $this->model->isRegistered($id_facebook,$nombre);
		}else{			
			echo "error";
		}
		
	}

	public function subeVideo()
	{

		$type="video";
	    if (isset($_FILES["${type}-blob"])) {		   
	        
	        $fileName = $_POST["${type}-filename"];
	        $uploadDirectory = 'uploads/'.$fileName;
	        
	        if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
	            echo(" problem moving uploaded file");
	        }else{

				$nombre_video = explode(".",$fileName);
		        $raw_name = $nombre_video[0];		    

		        /*
			    shell_exec("mkdir uploads/".$raw_name);
			    shell_exec("chmod -R 777 uploads/".$raw_name);
			    shell_exec("chown -R web.www-data uploads/".$raw_name);
			    */
			    //mkdir("uploads/temp/".$raw_name,0777);
			    //chown("uploads/".$raw_name,"web");
				// mkdir("uploads/".$raw_name,0777);
			   // mkdir("uploads/mmerino",0777);
				
				// ultimo funcando
				// shell_exec("ffmpeg -i uploads/".$fileName." -r 25 -ss 00:00:00 -t 00:00:15 -f image2 uploads/temp/".$raw_name."/oldfotograma-%05d.png");
				// shell_exec("ffmpeg -r 25 -b 5000k -i uploads/temp/".$raw_name."/oldfotograma-%5d.png -vcodec libx264 -pix_fmt yuv444p uploads/".$raw_name.".mp4");
				// end ultimo funcando
				
				//shell_exec("ffmpeg -i uploads/".$fileName." -r 25 -ss 00:00:00 -t 00:00:15 -vcodec libx264 -pix_fmt yuv444p uploads/".$raw_name.".mp4");
				shell_exec("avconv -i uploads/".$fileName." -r 25 -ss 00:00:00 -t 00:00:15 -vcodec libx264 uploads/".$raw_name.".mp4");
				
				//echo "ffmpeg -i uploads/".$fileName." -r 25 -ss 00:00:00 -t 00:00:15 -f image2 uploads/temp/".$raw_name."/oldfotograma-%05d.png";
	    
				
				//shell_exec("ffmpeg -r 25 -b 5000k -i test/".$raw_name."/finalFotograma-%5d.png -vcodec libx264 -pix_fmt yuv444p  -s 320×240 test/1drop_g_".$raw_name.".mp4");
				//sleep(1);
				//shell_exec("avconv -i uploads/".$raw_name.".webm -c:v libtheora -c:a libvorbis -q:v 3 uploads/".$raw_name.".ogv");
		         				       
				//rename("uploads/".$raw_name,"uploads/temp/".$raw_name);		         				       					
				/*
				$directorio    = opendir("uploads/temp/".$raw_name);	  
				while($archivo = readdir($directorio)){
				  if( !is_dir($archivo) ){
				  		rename("uploads/temp/".$raw_name."/".$archivo,"uploads/".$raw_name."_portada.png");
				  		break;
				  }			
				}
				*/

				//shell_exec("rm -R uploads/".$raw_name);

				echo "uploads/".$raw_name;

	        }

	    }
	}

	public function guardarVideo()
	{

		$user = $this->facebook->getUser();

	        if($user){
	            try {

	                $data['user_profile'] = $this->facebook->api('/me');	                
	                $id_facebook = $data['user_profile']['id'];
                    $nombre      = $data['user_profile']['name'];

					$video  = $this->input->post("video");
					$opcion = $this->input->post("opcion");

					if( $video!="" && $opcion!="" )
					{
						echo $this->model->guardarVideo($id_facebook,$nombre);
					}	                			                     
	                        
	            } catch (FacebookApiException $e){
	                $user = null;
	                echo 2;
	            }

	        } else {
	            $this->facebook->destroySession();
	            echo 2;
	        }

	}

	public function busqueda()
	{
		$q = trim($this->input->post("q"));

		if( $q!="" )
		{
			echo json_encode($this->model->busqueda($q));
		}

	}

	public function upload_file()
	{
	    $file_element_name = 'mobile_video';	     
	     
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'mp4|mov';
        $config['file_name']     = mktime();
        $config['max_size']      = 1000 * 20;
        $config['encrypt_name']  = FALSE;
 
        $this->load->library('upload', $config);
 
        if (!$this->upload->do_upload($file_element_name))
        {            
            $errors = $this->upload->display_errors('','');
            echo "<script>parent.error_upload('$errors');</script>";		            
        }
        else
        {
	        $data     = $this->upload->data();

            $name     = $data['file_name'];
            $ext      = $data["file_ext"];//.mp4
			$raw_name = $data["raw_name"];

			//shell_exec("mkdir uploads/temp/".$raw_name);
			mkdir("uploads/temp/".$raw_name,0777);
			//shell_exec("ffmpeg -i uploads/".$name." -r 25 -ss 00:00:00 -t 00:00:15 -f image2 uploads/temp/".$raw_name."/oldfotograma-%05d.png");			
			//shell_exec("ffmpeg -r 25 -b 5000k -i uploads/temp/".$raw_name."/oldfotograma-%5d.png -vcodec libx264 -pix_fmt yuv444p uploads/".$raw_name.".mp4");
			//shell_exec("avconv -r 25 -b 5000k -i uploads/temp/".$raw_name."/oldfotograma-%5d.png -c:v libtheora -c:a libvorbis -q:v 3 uploads/".$raw_name.".ogv");
			//shell_exec("avconv -r 25 -b 5000k -i uploads/temp/".$raw_name."/oldfotograma-%5d.png -c:v libvpx -b:v 1M -c:a libvorbis uploads/".$raw_name.".webm");
			//shell_exec("ffmpeg -i uploads/".$name." -r 25 -ss 00:00:00 -t 00:00:15 -f image2 uploads/temp/".$raw_name."/oldfotograma-%05d.png");

			shell_exec("avconv -i uploads/".$name." -r 25 -ss 00:00:00 -t 00:00:15 -c:v libvpx -b:v 1M -c:a libvorbis  uploads/".$raw_name.".webm");
			shell_exec("avconv -i uploads/".$name." -r 25 -ss 00:00:00 -t 00:00:15 -vcodec libx264 uploads/".$raw_name.".mp4");
            $name = $data['raw_name'];

            echo "<script>parent.sucess_upload('$name');</script>";
        }
	}

	public function test()
	{

		//shell_exec("rm -rf uploads/");

		//shell_exec("rm -R uploads/");
		/*
		$directorio    = opendir("uploads/");	  
		echo $directorio;
		die;
		while($archivo = readdir($directorio)){

		  if( !is_dir($archivo) ){
		  		rename("/uploads/".$raw_name."/".$archivo,"/uploads/".$raw_name_portada.".png");
		  		break;
		  }			

		}
		*/
		//shell_exec("rm -R uploads/166076490");
		//shell_exec('ffmpeg -r 25 -b 5000k -i uploads/162264079/newFotograma-%5d.png -vcodec libx264 -pix_fmt yuv444p uploads/drop_g_162264079.mp4');
		//shell_exec('avconv -i uploads/test.webm -c:v libtheora -c:a libvorbis -q:v 3 uploads/test.ogv');
		//echo 1;
	}	

	public function video()
	{	
		echo '<video autoplay width="100%" height="100%" >      
      <source src="'.base_url().'uploads/123580607.webm" type="video/webm">
      <source src="'.base_url().'uploads/123580607.mp4" type="video/mp4">
      
    </video>';
	}

	public function galeria()
	{
		$data['title'] = "Galeria";
		$this->load->template('galeria',$data);			
	}

}














