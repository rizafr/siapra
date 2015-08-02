<!-- This is what you need -->
<link rel="stylesheet" href="<?php echo base_url(); ?>aset/sweet-alert/example/button.css">
<script src="<?php echo base_url(); ?>aset/sweet-alert/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>aset/sweet-alert/dist/sweetalert.css">
<!--.......................-->


<script>
	// A $( document ).ready() block.
	$( document ).ready(function() {
	var text= "Ada 5 proses perkara yang akan disidangkan hari ini.";
	
		swal({
			title: "Perhatian!",
			text: text,
			type: "warning",
			showConfirmButton: true
		});
	});
	
</script>