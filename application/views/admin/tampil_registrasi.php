
    <!-- /.card-header -->
     <div class="box-body">
      <table  class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nomor Induk</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tempat & Tanggal Lahir</th>
            <th>Password</th>
            <th>Status</th>
            
            <!-- <th>Aksi</th> -->
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($data_registrasi as $row) {
          ?>
          <tr>
            <td><?= $row['no_induk']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['ttl']; ?></td>
            <td><?= $row['password']; ?></td>
            <td><?= $row['status']; ?></td>
            <!--  <td> -->
                
              <!-- <a href="<?php echo base_url() ?>Paud/AddData" 
                title="Add"><i class="fas fa-user-plus"></i></a>  --><!-- 
              <a href="<?php echo base_url() ?>Paud/edit/<?php echo $row->kode_pen_dini;?>//<?= $row->kode_tenaga_pendidik;?><?= $row->kode_sarana;?>" title="Edit"><i class="fas fa-edit"></a></i> -->
              <!-- <a href="<?php echo base_url() ?>Registrasi/hapus/<?php echo $row->id;?>/<?= $row->kode_sarana;?>/<?= $row->kode_tenaga_pendidik;?>" title="Delete"><i class="fas fa-trash-alt" ></i></a> 
            </td> -->
          </tr>

          <?php
            }
          ?>

          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- footer -->
  
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/dashboard/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dashboard/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dashboard/dist/js/demo.js"></script>
</body>
</html>
