<?php $this->load->view('includes/header'); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Download DB
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Download</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <p class="lead">
      You can download the full DB from below
    </p> 
    <div class="row">
      <div class="col-sm-10">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Ready</h3>
            <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
          </div><!-- /.box-header -->
          <div class="box-body">
            <p>Compiled and ready to use in production. Download this version.</p>
            <a href="<?php echo site_url('download/downloadDB');?>" class="btn btn-primary"><i class="fa fa-download"></i> Download DB</a>
          </div><!-- /.box-body -->
          <div class="box-body">
            <p>Compiled and ready to use in production. Download this version.</p>
            <a href="<?php echo site_url('download/downloadimg');?>" class="btn btn-primary"><i class="fa fa-download"></i> Download Images</a>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">DMM</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<?php $this->load->view('includes/footer'); ?>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>