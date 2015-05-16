<?php
namespace GroupMePHP;

class sms extends client {

	/**
	 * enable: Enable SMS mode for up to 48 hours.
	 * 
	 * @param string $duration
	 * @param string $registration_id
	 * 
	 * @return string $return
	 */
	public function enable($duration, $registration_id) {
		$params = array(
			'url' => '/users/sms_mode',
			'method' => 'POST',
			'query' => array(),
			'payload' => array(
				'duration' => $duration,
				'registration_id' => $registration_id
				)
		);
		
		return $this->request($params);
	}

	/**
	 * disable: Disable SMS mode.
	 * 
	 * @return string $return
	 */
	public function disable() {
		$params = array(
			'url' => '/users/sms_mode/delete',
			'method' => 'POST',
			'query' => array(),
			'payload' => array()
		);
		
		return $this->request($params);
	}
}
?>
