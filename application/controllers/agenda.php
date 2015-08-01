<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
		
	public function agenda_surat_masuk() {
		$a['page']	= "agenda/f_config_cetak_agenda";
		$this->load->view('admin/index', $a);
	} 
	public function agenda_surat_keluar() {
		$a['page']	= "agenda/f_config_cetak_agenda";
		$this->load->view('admin/index', $a);
	} 
	
	public function cetak_agenda() {
		$jenis_surat	= $this->input->post('tipe');
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		
		$a['tgl_start']	= $tgl_start;
		$a['tgl_end']	= $tgl_end;		

		if ($jenis_surat == "agenda_surat_masuk") {	
			$a['data']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE tgl_diterima >= '$tgl_start' AND tgl_diterima <= '$tgl_end' ORDER BY id")->result(); 
			$this->load->view('admin/agenda/agenda_surat_masuk', $a);
		} else {
			$a['data']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result();
			$this->load->view('admin/agenda/agenda_surat_keluar', $a);
		}
	}	
	
	public function jaksa() {
		$a['page']	= "agenda/l_laporan_jaksa";
		$this->load->view('admin/index', $a);
	} 
		
}
