<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
		
	public function surat_disposisi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		
		//ambil variabel URL
		$act					= $this->uri->segment(4);
		$idu1					= $this->uri->segment(3);
		$idu2					= $this->uri->segment(5);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$id_surat				= addslashes($this->input->post('id_surat'));
		$kpd_yth				= addslashes($this->input->post('kpd_yth'));
		$isi_disposisi			= addslashes($this->input->post('isi_disposisi'));
		$sifat					= addslashes($this->input->post('sifat'));
		$batas_waktu			= addslashes($this->input->post('batas_waktu'));
		$catatan				= addslashes($this->input->post('catatan'));
		
		$cari					= addslashes($this->input->post('q'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/surat_disposisi/".$idu1."/p");
		
		$a['judul_surat']	= gval("t_surat_masuk", "id", "isi_ringkas", $idu1);
		
		if ($act == "del") {
			$this->db->query("DELETE FROM t_disposisi WHERE id = '$idu2'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('disposisi/surat_disposisi/'.$idu2);
		} else if ($act == "add") {
			$a['page']		= "surat_disposisi/f_surat_disposisi";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_disposisi WHERE id = '$idu2'")->row();	
			$a['page']		= "surat_disposisi/f_surat_disposisi";
		} else if ($act == "act_add") {	
			$this->db->query("INSERT INTO t_disposisi VALUES (NULL, '$id_surat', '$kpd_yth', '$isi_disposisi', '$sifat', '$batas_waktu', '$catatan')");
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil ditambahkan</div>");
			redirect('disposisi/surat_disposisi/'.$id_surat);
		} else if ($act == "act_edt") {
			$this->db->query("UPDATE t_disposisi SET kpd_yth = '$kpd_yth', isi_disposisi = '$isi_disposisi', sifat = '$sifat', batas_waktu = '$batas_waktu', catatan = '$catatan' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah</div>");			
			redirect('disposisi/surat_disposisi/'.$id_surat);
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1' LIMIT $awal, $akhir ")->result();
			$a['page']		= "surat_disposisi/l_surat_disposisi";
		}
		
		$this->load->view('admin/index', $a);	
	}
	
		
		
	public function disposisi_cetak() {
		$idu = $this->uri->segment(3);
		$a['datpil1']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
		$a['datpil2']	= $this->db->query("SELECT kpd_yth FROM t_disposisi WHERE id = '$idu'")->result();	
		$a['datpil3']	= $this->db->query("SELECT isi_disposisi, sifat, batas_waktu FROM t_disposisi WHERE id = '$idu'")->result();	
		$this->load->view('admin/surat_disposisi/disposisi_cetak', $a);
	}
	
	
	
	
}
