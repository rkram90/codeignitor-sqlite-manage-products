<?php $this->load->view('includes/header'); ?>

  <!-- =============================================== -->
<style>
.cat_delete,.cat_edit{
  cursor: pointer;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Category
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Category List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>IstopLevel</th>
                  <th>Isparentcategory</th>
                  <th>Parent Category</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                foreach ($category as $key => $cat) {
                  $sno = $key+1;
                 echo "<tr>";
                  echo " <td>".$sno."</td>";
                  echo " <td>$cat->name</td>";
                  echo " <td>$cat->isTopLevelCategory</td>";
                  echo " <td>$cat->isParentCategory</td>";
                  echo " <td>$cat->parentCategoryId</td>";
                  echo " <td><a class='cat_edit' href='".site_url('category/edit/'.$cat->id)."'><span class='glyphicon glyphicon-pencil' ></span></a></td>";
                  echo " <td><a class='cat_delete' data-url='".site_url('category/delete/'.$cat->id)."' href='#'><span class='glyphicon glyphicon-trash' ></span></a></td>";
                 echo "</tr>";
                }
                ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>IstopLevel</th>
                  <th>Isparentcategory</th>
                  <th>Parent Category</th>
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
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

    $('#example2').on('click','.cat_delete',function(){
        if(confirm('Are you sure you want to delete this category?')){
          var redirecturl = $(this).data('url');
          window.location = redirecturl;
        }else{
          return false;
        }
    });

  });
</script>