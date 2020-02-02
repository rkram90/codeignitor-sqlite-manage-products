<?php $this->load->view('includes/header'); ?>

  <!-- =============================================== -->

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
          <h3 class="box-title">Add Category</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
                    <!-- Horizontal Form -->

<?php echo validation_errors(); ?>
            <!-- form start -->
    <form class="form-horizontal" method="post" action="<?php echo site_url('category/add')?>" enctype="multipart/form-data">

        <div class="form-group">
            <label class="control-label col-xs-3" for="firstName">Name:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="name" id="firstName" placeholder="Name" value="<?php echo isset($post['name'])?$post['name']:'';?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3">Is Top Level:</label>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" <?php echo isset($post['istoplevel'])&&$post['istoplevel']==1?'checked':'';?> name="istoplevel" value="1"> Yes
                </label>
            </div>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" <?php echo isset($post['istoplevel'])&&$post['istoplevel']==0?'checked':'';?> name="istoplevel" value="0"> No
                </label>
            </div>
        </div>

         <div class="form-group">
            <label class="control-label col-xs-3">Is Parent:</label>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" <?php echo isset($post['isparent'])&&$post['isparent']==1?'checked':'';?> name="isparent" value="1"> Yes
                </label>
            </div>
            <div class="col-xs-2">
                <label class="radio-inline">
                    <input type="radio" <?php echo isset($post['isparent'])&&$post['isparent']==0?'checked':'';?> name="isparent" value="0"> No
                </label>
            </div>
        </div>

         <div class="form-group" id="parent_cat_container">
            <label class="control-label col-xs-3" for="order">Parent Category:</label>
            <div class="col-xs-9">
                  <select class="form-control" name="parent_cat_id">
                  <option value="">--Select Category--</option>
                  <?php foreach($parent_cat as $pcat){?>
                    <option <?php echo isset($post['parent_cat_id'])&&$post['parent_cat_id']==$pcat['id']?'selected':'';?> value="<?php echo $pcat['id']?>"><?php echo $pcat['name']?></option>
                    <?php } ?>
                  </select>
            </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Description</label>
          <div class="col-xs-9">
            <textarea name="description" class="form-control" rows="3" placeholder="Enter Category Description.."><?php echo isset($post['description'])&&$post['isparent']!=''?$post['description']:'';?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Image</label>
          <div class="col-xs-9">
            <input id="exampleInputFile" class="form-control" name="categoryimage" type="file">
          </div>
        </div>
        
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" name="add" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </div>
    </form>
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