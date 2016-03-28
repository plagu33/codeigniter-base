<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sociales extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Sociales_model','sociales');
	}

	public function getSociales()
	{
		$this->getTwitts();
		$this->getInstagram();
	}

	public function getTwitts()
	{

		/*twitter*/
		$this->config->load('twitter');		
		$this->hashtag = $this->config->item('hashtag');
		$params = array(
						'twitter_consumer_token'  => $this->config->item('twitter_consumer_token'), 
						'twitter_consumer_secret' => $this->config->item('twitter_consumer_secret'),
						'twitter_access_token'    => $this->config->item('twitter_access_token'), 
						'twitter_access_secret'   => $this->config->item('twitter_access_secret')
				  );
		$this->load->library('twitteroauth',$params,"twitter");		

		$hashtag = $this->hashtag;

		$exclude = '-filter:retweets'; /*no retweets*/
		$params  = array('q' =>'#'.$hashtag.$exclude);
		$results = $this->twitter->get('search/tweets',$params);

		foreach ($results->statuses as $key)
		{

			$type              = @$key->entities->media[0]->type;
			$profile_image_url = $key->user->profile_image_url_https;
			$image             = @$key->entities->media[0]->media_url;

			if( is_null($type) ) $type = "text";
			if( is_null($profile_image_url) ) $profile_image_url = "";
			if( is_null($image) ) $image = "";

			//$created_at        = $key->created_at;
			$id_str            = $key->id_str;
			$text              = $key->text;
			$username          = $key->user->name;
			$screen_name       = $key->user->screen_name;
			

			$this->sociales->saveTweets($screen_name,$profile_image_url,$text,$id_str,$username,$image,$type);
			
		}	

	}

	public function getInstagram()
	{

		$this->config->load('instagram');

		$client_id = $this->config->item('client_id');
		$hashtag   = $this->config->item('hashtag');

		$json   = file_get_contents_curl('https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent?client_id='.$client_id);
		$array  = json_decode($json,true);
		echo "<pre>";
		
		foreach($array['data'] as $data)
		{

			$video = @$data['videos']['standard_resolution']['url'];

			if($video=="")
			{

				$image             = @$data['images']['standard_resolution']['url'];
				$username          = $data['user']['username'];
				$usuario           = $data['user']['full_name'];
				$texto             = utf8_decode($data['caption']['text']);
				$profile_image_url = $data['caption']['from']['profile_picture'];
			
				$this->sociales->saveInstagram($image,$username,$texto,$profile_image_url,$usuario,"photo");

			}

		}		

		print_r($array);

	}

}