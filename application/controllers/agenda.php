<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {
	function __construct() {
		parent::__construct();
		 //$this->load->model('agenda_model');
		 $this->load->model('web_model');
	}
	
	//Laporan Jaksa
	public function agenda_jaksa() {
		$a['jaksa_list'] = $this->web_model->get_dropdown_list();
		$a['page']	= "agenda/f_agenda_jaksa";
		$this->load->view('admin/index', $a);
	} 	
	
	public function jaksa_cetak(){
		$id_jaksa 		= $this->input->post('id_jaksa');
		$tgl_start		= $this->input->post('tgl_start');
		$tgl_end		= $this->input->post('tgl_end');
		
		$a['data']	= $this->db->query("SELECT p.no_agenda, p.nama_tersangka, p.perkara, p.tanggal_perkara, j.nama_jaksa, j.nip 
										from perkara p, jaksa j where p.id_jaksa = p.id_jaksa AND j.id_jaksa =  '$id_jaksa'
										and p.tanggal_perkara >= '$tgl_start' AND tanggal_perkara <= '$tgl_end'")->result(); 
		$this->load->view('admin/agenda/jaksa_cetak', $a);
		
	}
	
	
	//Laporan Surat Masuk
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
			$a['data']	= $this->db->query("SELECT * FROM surat_masuk WHERE tgl_diterima >= '$tgl_start' AND tgl_diterima <= '$tgl_end' ORDER BY id")->result(); 
			$this->load->view('admin/agenda/agenda_surat_masuk', $a);
		} else if ($jenis_surat == "agenda_surat_keluar"){
			$a['data']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE tgl_catat >= '$tgl_start' AND tgl_catat <= '$tgl_end' ORDER BY id")->result();
			$this->load->view('admin/agenda/agenda_surat_keluar', $a);
		} else {
			$a['data']	= $this->db->query("SELECT * FROM jaksa")->result();
			$this->load->view('admin/agenda/agenda_jaksa', $a);
		}
	}
}
