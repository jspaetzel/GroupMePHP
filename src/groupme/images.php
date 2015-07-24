<?php
namespace GroupMePHP;

class images extends image_client {
	
	/**
	 * pictures: Uploads a picture to the GroupMe Image servvice and returns the URL.
	 *
	 * @param $url URL to image
	 * @return string $response from GroupMe API
	 *
	 */
	public function pictures($url){
		$file = $url;
		$path = parse_url($url);
		if ($path['scheme'] == "http" || $path['scheme'] == "https") {
			$file = tempnam(sys_get_temp_dir(), "gm_");
			file_put_contents($file, file_get_contents($url));
		}
		
		$file = "@" . $file;

		$params = array(
			'url' => "/pictures",
			'method' => 'POST',
			'payload' => array("file" => $file),
			'query' => array()
		);

		$response = $this->request($params);
				
		if ($file != $url){
		    unlink(substr($file, 1));
		}

                return $response;
	}
}
?>
