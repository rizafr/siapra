<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posisi_perkara extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	
	public function proses_perkara() {
		$a['page']	= "posisi_perkara/l_proses_perkara";
		$this->load->view('admin/index', $a);
	} 
	
		
	
}
