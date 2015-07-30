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
		$id_suratu				= $this->uri->segment(3);
		$id_dispu				= $this->uri->segment(5);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$id_disposisi			= addslashes($this->input->post('id_disposisi'));
		$id_surat_masuk			= addslashes($this->input->post('id_surat_masuk'));
		$tujuan_disposisi		= addslashes($this->input->post('tujuan_disposisi'));
		$isi_instruksi			= addslashes($this->input->post('isi_instruksi'));
		$tgl_instruksi			= addslashes($this->input->post('tgl_instruksi'));
		$waktu_lama_instruksi	= addslashes($this->input->post('waktu_lama_instruksi'));
		$paraf_kasi				= addslashes($this->input->post('paraf_kasi'));
		$paraf_kajari 			= addslashes($this->input->post('paraf_kajari'));
		$tgl_disposisi			= addslashes($this->input->post('tgl_disposisi'));
		$catatan				= addslashes($this->input->post('catatan'));
		
		$cari					= addslashes($this->input->post('q'));
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM disposisi WHERE id_surat_masuk = '$id_suratu'")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."disposisi/surat_disposisi/".$id_suratu."/p");
		
		$a['judul_surat']	= gval("surat_masuk", "id_surat_masuk", "perihal_surat_masuk", $id_suratu);
		
		if ($act == "del") {
			$this->db->query("DELETE FROM disposisi WHERE id_disposisi = '$id_dispu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil dihapus </div>");
			redirect('disposisi/surat_disposisi/'.$id_dispu);
		} else if ($act == "add") {
			$a['page']		= "surat_disposisi/f_surat_disposisi";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM disposisi WHERE id_disposisi = '$id_dispu'")->row();	
			$a['page']		= "surat_disposisi/f_surat_disposisi";
		} else if ($act == "act_add") {	
			$this->db->query("INSERT INTO disposisi VALUES (NULL, '$id_surat_masuk', '$isi_instruksi', '$tgl_instruksi', '$waktu_lama_instruksi', '$paraf_kasi', '$paraf_kajari', '$tujuan_disposisi', '$tgl_disposisi', '$catatan')");
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil ditambahkan</div>");
			redirect('disposisi/surat_disposisi/'.$id_surat_masuk);
		} else if ($act == "act_edt") {
			$this->db->query("UPDATE disposisi SET tujuan_disposisi = '$tujuan_disposisi', isi_instruksi = '$isi_instruksi', tgl_instruksi = '$tgl_instruksi', waktu_lama_instruksi = '$waktu_lama_instruksi', tgl_disposisi = '$tgl_disposisi', paraf_kajari = '$paraf_kajari', paraf_kasi = '$paraf_kasi', catatan = '$catatan' WHERE id_disposisi = '$id_disposisi'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data berhasil diubah</div>");			
			redirect('disposisi/surat_disposisi/'.$id_surat_masuk);
		} else {
			$a['data']		= $this->db->query("SELECT * FROM disposisi WHERE id_surat_masuk = '$id_suratu' LIMIT $awal, $akhir ")->result();
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
