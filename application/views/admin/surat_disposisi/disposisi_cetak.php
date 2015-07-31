<?php 
$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
?>

<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 60%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
</head>

<body onload="window.print()">
<table>
	<tr><td colspan="3">
	<h2><?php echo $q_instansi->nama; ?></h2>
	Alamat : <?php echo $q_instansi->alamat; ?>	
	</td>
	</tr>
	
	<tr><td colspan="3" align="center" style="padding: 15px 0"><b style="font-size: 21px;">LEMBAR DISPOSISI</b></td></tr>
	
	<tr><td></td><td></td>
	<td  colspan="4"><b align="right">SIFAT SURAT</b>: <?php echo $datpil1->status_surat_masuk; ?></td></tr>
	
	<tr><td><b>INDEKS</b></td>
	<td  width="50%"> : <?php echo $datpil1->index_surat_masuk; ?></td>
	<td><b align="right">NO. AGENDA</b>
	: <?php echo $datpil1->no_agenda; ?></td></tr>
	
	<tr><td></td><td></td>
	<td  colspan="4"><b align="right">TGL MASUK</b>: <?php echo $datpil1->tgl_diterima; ?></td></tr>
</table>

<table>
	<tr><td><b>PERIHAL</b></td><td colspan="2">: <?php echo $datpil1->perihal_surat_masuk; ?></td></tr>
	<tr><td width="25%"><b>TGL SURAT</b></td><td colspan="2">: <?php echo tgl_jam_sql($datpil1->tgl_surat_masuk) ?></td></tr>
	<tr><td width="25%"><b>NO SURAT</b></td><td colspan="2">: <?php echo $datpil1->no_surat_masuk; ?></td></tr>
	<tr><td><b>ASAL SURAT</b></td><td colspan="2">: <?php echo $datpil1->asal_surat_masuk; ?></td></tr>
</table>

<table>
	<tr><td style="height: 350px" valign="top" colspan="2" align="center"><b>INSTRUKSI /  INFORMASI: </b> <br><br>
	<ol>
	<?php 
	if (!empty($datpil3)) {
		foreach ($datpil3 as $d3) {
			echo "<li><b><i>".$d3->isi_instruksi."</i>";
		}
	}
	?>
	</ol>
	</b></td>
	
	<td  align="center" valign="top" width="50%" style="border-left: solid 1px">
	<b>DITERUSKAN KEPADA :</b> 
	<ol>
	<?php 
	if (!empty($datpil2)) {
		foreach ($datpil2 as $dp) {
			echo "<li>".$dp->tujuan_disposisi."</li>";
		}
	}
	?>
	</ol>
	</td></tr>
</table>
</body>
</html>
