<footer class="footer text-center"> 2017 &copy; Ampleadmin brought to you by themedesigner.in </footer>
</div>
<!-- /#page-wrapper -->
</div>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/templates/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--Counter js -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?= base_url('assets/templates/') ?>js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/templates/') ?>js/waves.js"></script>
<!-- Vector map JavaScript -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/vectormap/jquery-jvectormap-in-mill.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/vectormap/jquery-jvectormap-us-aea-en.js"></script>
<!-- chartist chart -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!-- sparkline chart JavaScript -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets/templates/') ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/templates/') ?>js/dashboard3.js"></script>
<!--Style Switcher -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<!-- morris -->
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/raphael/raphael-min.js"></script>
<script src="<?= base_url('assets/templates/') ?>plugins/bower_components/morrisjs/morris.js"></script>
<script src="<?= base_url('assets/templates/') ?>js/morris-data.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
	$(document).ready(function() {
		$('.myTable').DataTable();
		$(document).ready(function() {
			var table = $('.example').DataTable({
				"columnDefs": [{
					"visible": false,
					"targets": 2
				}],
				"order": [
				[2, 'asc']
				],
				"displayLength": 25,
				"drawCallback": function(settings) {
					var api = this.api();
					var rows = api.rows({
						page: 'current'
					}).nodes();
					var last = null;
					api.column(2, {
						page: 'current'
					}).data().each(function(group, i) {
						if (last !== group) {
							$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
							last = group;
						}
					});
				}
			});
            // Order by the grouping
            $('.example tbody').on('click', 'tr.group', function() {
            	var currentOrder = table.order()[0];
            	if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            		table.order([2, 'desc']).draw();
            	} else {
            		table.order([2, 'asc']).draw();
            	}
            });
        });
	});
	$('.example23').DataTable({
		dom: 'Bfrtip',
		buttons: [
		'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});

</script>
<script>
	$(document).ready(function() {
		var grafik = document.getElementById('grafik');

		if (grafik) {
			Morris.Area({
				element: 'morris-area-charto',
				data:
				<?php echo "[{
					period: '10',
					Ratarata: ";
					if ($rata210['rata_rata'] == null) {
						echo "0";
					}else{
						echo $rata210['rata_rata'];
					}
					echo "}, {
						period: '11',
						Ratarata: ";
						if ($rata211['rata_rata'] == null) {
							echo "0";
						}else{
							echo $rata211['rata_rata'];
						}
						echo "},{
							period: '12',
							Ratarata: ";
							if ($rata212['rata_rata'] == null) {
								echo "0";
							}else{
								echo $rata212['rata_rata'];
							}
							echo "}],";?>
							xkey: 'period',
							ykeys: ['Ratarata'],
							labels: ['Rata-rata'],
							pointSize: 3,
							fillOpacity: 0,
							pointStrokeColors:['#00bfc7'],
							behaveLikeLine: true,
							gridLineColor: '#e0e0e0',
							lineWidth: 1,
							hideHover: 'auto',
							lineColors: ['#00bfc7'],
							resize: true
							
						});
		}
	});
</script>
</body>

</html>
