<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		$a['page']	= "beranda";
		
		$this->load->view('admin/index', $a);
	}

	public function klas_surat() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM ref_klasifikasi")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/klas_surat/p");
		
		//ambil variabel URL
		$act					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$nama					= addslashes($this->input->post('nama'));
		$uraian					= addslashes($this->input->post('uraian'));
	
		$cari					= addslashes($this->input->post('q'));

		
		if ($act == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM ref_klasifikasi WHERE nama LIKE '%$cari%' OR uraian LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_klas_surat";
		} else if ($act == "add") {
			$a['page']		= "f_klas_surat";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM ref_klasifikasi WHERE id = '$idu'")->row();	
			$a['page']		= "f_klas_surat";
		} else if ($act == "act_edt") {
			$this->db->query("UPDATE ref_klasifikasi SET nama = '$nama', uraian = '$uraian' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('admin/klas_surat');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM ref_klasifikasi LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_klas_surat";
		}
		
		$this->load->view('admin/index', $a);
	}
	
	public function surat_masuk() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_surat_masuk")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/surat_masuk/p");
		
		//ambil variabel URL
		$act					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$indek_berkas			= addslashes($this->input->post('indek_berkas'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/surat_masuk';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		if ($act == "del") {
			$this->db->query("DELETE FROM t_surat_masuk WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('admin/surat_masuk');
		} else if ($act == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_surat_masuk WHERE isi_ringkas LIKE '%$cari%' OR indek_berkas LIKE '%$cari%' OR dari LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_surat_masuk";
		} else if ($act == "add") {
			$a['page']		= "f_surat_masuk";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
			$a['page']		= "f_surat_masuk";
		} else if ($act == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_surat_masuk VALUES (NULL, '$kode', '	$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_surat_masuk VALUES (NULL, '$kode', '$no_agenda', '$indek_berkas', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added. ".$this->upload->display_errors()."</div>");
			redirect('admin/surat_masuk');
		} else if ($act == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
							
				$this->db->query("UPDATE t_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_surat_masuk SET kode = '$kode', no_agenda = '$no_agenda', indek_berkas = '$indek_berkas', isi_ringkas = '$uraian', dari = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated. ".$this->upload->display_errors()."</div>");			
			redirect('admin/surat_masuk');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_surat_masuk LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_surat_masuk";
		}
		
		$this->load->view('admin/index', $a);
	}

	public function surat_keluar() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">Maaf Anda belum login. Silakan login terlebih dahulu</div>");
			redirect("logins/login");
		}
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_surat_keluar")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."admin/surat_keluar/p");
		
		//ambil variabel URL
		$act					= $this->uri->segment(3);
		$idu					= $this->uri->segment(4);
		
		$cari					= addslashes($this->input->post('q'));

		//ambil variabel Postingan
		$idp					= addslashes($this->input->post('idp'));
		$no_agenda				= addslashes($this->input->post('no_agenda'));
		$kode					= addslashes($this->input->post('kode'));
		$dari					= addslashes($this->input->post('dari'));
		$no_surat				= addslashes($this->input->post('no_surat'));
		$tgl_surat				= addslashes($this->input->post('tgl_surat'));
		$uraian					= addslashes($this->input->post('uraian'));
		$ket					= addslashes($this->input->post('ket'));
		
		$cari					= addslashes($this->input->post('q'));

		//upload config 
		$config['upload_path'] 		= './upload/surat_keluar';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|doc|docx';
		$config['max_size']			= '2000';
		$config['max_width']  		= '3000';
		$config['max_height'] 		= '3000';

		$this->load->library('upload', $config);
		
		
		if ($act == "del") {
			$this->db->query("DELETE FROM t_surat_keluar WHERE id = '$idu'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted </div>");
			redirect('admin/surat_keluar');
		} else if ($act == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_surat_keluar WHERE isi_ringkas LIKE '%$cari%' OR tujuan LIKE '%$cari%' OR no_surat LIKE '%$cari%' ORDER BY id DESC")->result();
			$a['page']		= "l_surat_keluar";
		} else if ($act == "add") {
			$a['page']		= "f_surat_keluar";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_surat_keluar WHERE id = '$idu'")->row();	
			$a['page']		= "f_surat_keluar";
		} else if ($act == "act_add") {	
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("INSERT INTO t_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '".$up_data['file_name']."', '".$this->session->userdata('admin_id')."')");
			} else {
				$this->db->query("INSERT INTO t_surat_keluar VALUES (NULL, '$kode', '$no_agenda', '$uraian', '$dari', '$no_surat', '$tgl_surat', NOW(), '$ket', '', '".$this->session->userdata('admin_id')."')");
			}		
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('admin/surat_keluar');
		} else if ($act == "act_edt") {
			if ($this->upload->do_upload('file_surat')) {
				$up_data	 	= $this->upload->data();
				
				$this->db->query("UPDATE t_surat_keluar SET no_agenda = '$no_agenda', kode = '$kode', isi_ringkas = '$uraian', tujuan = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket', file = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_surat_keluar SET no_agenda = '$no_agenda', kode = '$kode', isi_ringkas = '$uraian', tujuan = '$dari', no_surat = '$no_surat', tgl_surat = '$tgl_surat', keterangan = '$ket' WHERE id = '$idp'");
			}	
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated ".$this->upload->display_errors()."</div>");			
			redirect('admin/surat_keluar');
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_surat_keluar LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_surat_keluar";
		}
		
		$this->load->view('admin/index', $a);
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
			redirect('admin/surat_disposisi/'.$idu2);
		} else if ($act == "add") {
			$a['page']		= "f_surat_disposisi";
		} else if ($act == "edt") {
			$a['datpil']	= $this->db->query("SELECT * FROM t_disposisi WHERE id = '$idu2'")->row();	
			$a['page']		= "f_surat_disposisi";
		} else if ($act == "act_add") {	
			$this->db->query("INSERT INTO t_disposisi VALUES (NULL, '$id_surat', '$kpd_yth', '$isi_disposisi', '$sifat', '$batas_waktu', '$catatan')");
			
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
			redirect('admin/surat_disposisi/'.$id_surat);
		} else if ($act == "act_edt") {
			$this->db->query("UPDATE t_disposisi SET kpd_yth = '$kpd_yth', isi_disposisi = '$isi_disposisi', sifat = '$sifat', batas_waktu = '$batas_waktu', catatan = '$catatan' WHERE id = '$idp'");
			$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been updated</div>");			
			redirect('admin/surat_disposisi/'.$id_surat);
		} else {
			$a['data']		= $this->db->query("SELECT * FROM t_disposisi WHERE id_surat = '$idu1' LIMIT $awal, $akhir ")->result();
			$a['page']		= "l_surat_disposisi";
		}
		
		$this->load->view('admin/index', $a);	
	}
	
		
	public function proses_perkara() {
		$a['page']	= "l_proses_perkara";
		$this->load->view('admin/index', $a);
	} 
	
	
	public function get_klasifikasi() {
		$kode 				= $this->input->post('kode',TRUE);
		
		$data 				=  $this->db->query("SELECT id, kode, nama FROM ref_klasifikasi WHERE kode LIKE '%$kode%' ORDER BY id ASC")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$json_array				= array();
            $json_array['value']	= $d->kode;
			$json_array['label']	= $d->kode." - ".$d->nama;
			$klasifikasi[] 			= $json_array;
		}
		
		echo json_encode($klasifikasi);
	}
	
	public function get_instansi_lain() {
		$kode 				= $this->input->post('dari',TRUE);
		
		$data 				=  $this->db->query("SELECT dari FROM t_surat_masuk WHERE dari LIKE '%$kode%' GROUP BY dari")->result();
		
		$klasifikasi 		=  array();
        foreach ($data as $d) {
			$klasifikasi[] 	= $d->dari;
		}
		
		echo json_encode($klasifikasi);
	}
	
	public function disposisi_cetak() {
		$idu = $this->uri->segment(3);
		$a['datpil1']	= $this->db->query("SELECT * FROM t_surat_masuk WHERE id = '$idu'")->row();	
		$a['datpil2']	= $this->db->query("SELECT kpd_yth FROM t_disposisi WHERE id = '$idu'")->result();	
		$a['datpil3']	= $this->db->query("SELECT isi_disposisi, sifat, batas_waktu FROM t_disposisi WHERE id = '$idu'")->result();	
		$this->load->view('admin/f_disposisi', $a);
	}
	
	
	
	
}
