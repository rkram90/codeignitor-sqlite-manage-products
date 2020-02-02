<?php $this->load->view('includes/header'); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Product
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Product</h3>

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
    <form class="form-horizontal" method="post" action="<?php echo site_url('product/edit/'.$post['id'])?>" enctype="multipart/form-data">

        <div class="form-group">
            <label class="control-label col-xs-3" for="name">Category:</label>
            <div class="col-xs-9">
               <select name="category_id" class="form-control">
                  <option value="">--Please the category--</option>
                  <?php foreach($parent_cat as $cat) { ?>
                  <option <?php if(isset($post['productCategoryId'])&&$post['productCategoryId']==$cat['id']){echo "selected";}?> value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                  <?php } ?>
                 </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="name">Name:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo isset($post['name'])?$post['name']:'';?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3">Price:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo isset($post['price'])?$post['price']:'';?>" >
            </div>
        </div>

         <div class="form-group">
            <label class="control-label col-xs-3">Discout Price:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="dprice" id="dprice" placeholder="Discount Price" value="<?php echo isset($post['discountPrice'])?$post['discountPrice']:'';?>" >
            </div>
        </div>

       <div class="form-group">
          <label class="control-label col-xs-3">Is Deal of the Day:</label>
           <div class="col-xs-2">
              <label class="radio-inline">
                  <input type="radio" <?php echo isset($post['dealOfDay'])&&$post['dealOfDay']==1?'checked':'';?> name="dealofday" value="1"> Yes
              </label>
          </div>
          <div class="col-xs-2">
              <label class="radio-inline">
                  <input type="radio" <?php echo isset($post['dealOfDay'])&&$post['dealOfDay']==0?'checked':'';?> name="dealofday" value="0"> No
              </label>
          </div>
      </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Short Description</label>
          <div class="col-xs-9">
            <textarea name="shortdescription" class="form-control" rows="3" placeholder="Enter Product Short Description.."><?php echo isset($post['shortDescription'])?$post['shortDescription']:'';?></textarea>
          </div>
        </div>
       
        <div class="form-group">
          <label class="control-label col-xs-3">First Description Title</label>
          <div class="col-xs-9">
            <input name="firstdescriptiontitle" class="form-control" rows="3" placeholder="Enter First Description title" value="<?php echo isset($post['firstDescriptionTitle'])?$post['firstDescriptionTitle']:'';?>" />
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">First Description Bone</label>
          <div class="col-xs-9">
            <textarea name="firstdescriptionbone" class="form-control" rows="3" placeholder="Enter first Description Bone.."><?php echo isset($post['fDescriptionBOne'])?$post['fDescriptionBOne']:'';?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3">First Description Btwo</label>
          <div class="col-xs-9">
            <textarea name="firstdescriptionbtwo" class="form-control" rows="3" placeholder="Enter first Description Btwo.."><?php echo isset($post['fDescriptoinBTwo'])?$post['fDescriptoinBTwo']:'';?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3">First Description Bthree</label>
          <div class="col-xs-9">
            <textarea name="firstdescriptionbthree" class="form-control" rows="3" placeholder="Enter first Description Bthree.."><?php echo isset($post['fDescriptionBThree'])?$post['fDescriptionBThree']:'';?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Second Description Title</label>
          <div class="col-xs-9">
            <input name="seconddescriptiontitle" class="form-control" rows="3" placeholder="Enter Second Description title" value="<?php echo isset($post['secondDescriptionTitle'])?$post['secondDescriptionTitle']:'';?>" />
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Second Description Bone</label>
          <div class="col-xs-9">
            <textarea name="seconddescriptionbone" class="form-control" rows="3" placeholder="Enter Second Description Bone.."><?php echo isset($post['sDescriptionBOne'])?$post['sDescriptionBOne']:'';?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3">Second Description Btwo</label>
          <div class="col-xs-9">
            <textarea name="seconddescriptionbtwo" class="form-control" rows="3" placeholder="Enter Second Description Btwo.."><?php echo isset($post['sDescriptoinBTwo'])?$post['sDescriptoinBTwo']:'';?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3">Second Description Bthree</label>
          <div class="col-xs-9">
            <textarea name="seconddescriptionbthree" class="form-control" rows="3" placeholder="Enter Second Description Bthree.."><?php echo isset($post['sDescriptionBThree'])?$post['sDescriptionBThree']:'';?></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Third Description Title</label>
          <div class="col-xs-9">
            <input name="thirddescriptiontitle" class="form-control" rows="3" placeholder="Enter Third Description title" value="<?php echo isset($post['thirdDescriptionTitle'])?$post['thirdDescriptionTitle']:'';?>"/>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3">Third Description Bone</label>
          <div class="col-xs-9">
            <textarea name="thirddescriptionbone" class="form-control" rows="3" placeholder="Enter Third Description Bone.."><?php echo isset($post['tDescriptionBOne'])?$post['tDescriptionBOne']:'';?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3">Third Description Btwo</label>
          <div class="col-xs-9">
            <textarea name="thirddescriptionbtwo" class="form-control" rows="3" placeholder="Enter Third Description Btwo.."><?php echo isset($post['tDescriptoinBTwo'])?$post['tDescriptoinBTwo']:'';?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3">Third Description Bthree</label>
          <div class="col-xs-9">
            <textarea name="thirddescriptionbthree" class="form-control" rows="3" placeholder="Enter Third Description Bthree.."><?php echo isset($post['tDescriptionBThree'])?$post['tDescriptionBThree']:'';?></textarea>
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-xs-3">Image</label>
          <div class="col-xs-4">
            <input id="exampleInputFile" class="form-control" multiple name="Productimage[]" type="file">
          </div>
          <?php if(!empty($product_image)){ ?>
          <div class="col-md-5 col-sm-5 col-xs-5">
          <?php foreach ($product_image as $key => $img) { ?>
             <a href="<?php echo base_url('uploads/product_image/'.$img['imageUrl'])?>" target="_blank"><img src="<?php echo base_url('uploads/product_image/'.$img['imageUrl'])?>" alt="category <?php echo base_url('uploads/product_image/'.$img['imageUrl'])?>mage" width="100px" height="100px"></a>
          <?php } ?>
          </div>
          <?php }?>
        </div>
        
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" name="edit" value="Submit">
                <a class="btn btn-default" href="<?php echo site_url('product');?>">Back</a>
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