<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Manajemen Perkara</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>manajemen_perkara/perkara/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
						</ul>						
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	
	<?php echo $this->session->flashdata("k");?>
	
	<!--	
		<div class="alert alert-dismissable alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>Well done!</strong> You successfully read <a href="http://bootswatch.com/amelia/#" class="alert-link">this important alert message</a>.
		</div>
		
		<div class="alert alert-dismissable alert-danger">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>Oh snap!</strong> <a href="http://bootswatch.com/amelia/#" class="alert-link">Change a few things up</a> and try submitting again.
		</div>	
	-->
	<div class="adv-table">		
		<section id="unseen">
			<table  class="display table table-bordered table-striped table-condensed" id="example">
				<thead>
					<tr>
						<th width="10%">No. Agenda</th>
						<th width="10%">Tanggal Perkara</th>
						<th width="15%">Nama Tersangka</th>
						<th width="20%">Perkara</th>
						<th width="9%">Jaksa</th>
						<th width="25%">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						
						if (empty($data)) {
							echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} else {
							$no 	= ($this->uri->segment(4) + 1);
							foreach ($data as $b) {
							?>
							<tr>
								<td><?php echo $b->no_agenda;?></td>
								<td><?php echo tgl_jam_sql($b->tanggal_perkara)?></td>
								<td><?php echo $b->nama_tersangka; ?></td>
								<td><?php echo $b->perkara?></td>
								<td> <?php echo $b->nama_jaksa?></td>		
								<td>
									
									<div class="btn-group">
										<a href="<?php echo base_URL()?>manajemen_perkara/perkara/edt/<?php echo $b->id_perkara?>" class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i> Edt</a>
										<a href="<?php echo base_URL()?>manajemen_perkara/perkara/del/<?php echo $b->id_perkara?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Del</a>			
										<a href="<?php echo base_URL()?>posisi_perkara/proses_perkara/<?php echo $b->id_perkara?>" class="btn btn-default btn-sm"  title="Posisi Perkara"><i class="icon-trash icon-list"> </i> Perkara</a>
										<a href="<?php echo base_URL()?>posisi_penahanan/proses_penahanan/<?php echo $b->id_perkara?>" class="btn btn-info btn-sm" title="Posisi Penahanan"><i class="icon-print icon-white"> </i> Penahanan</a>
									</div>	
								</td>
							</tr>
							<?php 
								$no++;
							}
						}
					?>
				</tbody>
			</table>
		</section>
	</div>
</div>
