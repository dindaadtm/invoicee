<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class request extends MX_Controller {

	
	public function __construct()
	{
		parent::__construct();
	}

	function antiInjection($str) {
		$r = stripslashes(strip_tags(htmlspecialchars($str, ENT_QUOTES)));
		return $r;
	}

	public function get_bank_soal_ipa()
	{
		$soal_ipa = $this->db->get('ipa')->result();
		echo json_encode($soal_ipa);
	}

}
?>
