<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	protected $upload_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model','product_model');
		$this->load->model('Product_Category_model','product_cat_model');
		$this->load->model('Product_Image_model','product_img_model');
		$this->load->model('Image_model','img_model');
		$this->load->model('category_model');
	    $this->load->library('form_validation');


	}
	public function index()
	{
		$data = $product_arry = array();
		$products = $this->product_model->get_entries();
		foreach ($products as $key => $product) {
			$show_list = array();
			$show_list['name'] = $product->name;
			$show_list['id'] = $product->id;
			$category_data = $this->category_model->GetCriteria(array('id'=>$product->productCategoryId));
			if(isset($category_data[0])){
				$show_list['cat_name'] = $category_data[0]['name'];
			}else{
				$show_list['cat_name'] = '';
			}
			$product_arry[] = $show_list;
		}

		$data['products'] = $product_arry;

		$this->load->view('product/list',$data);
	}

	public function add()
	{	
		if($this->input->post('add')){
			$this->form_validation->set_rules('category_id', 'Category', 'required|trim');
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('price', 'Price', 'required|trim');
			$this->form_validation->set_rules('shortdescription', 'Short Description', 'required|trim');
			$filter_img_array = array_filter($_FILES['Productimage']['name']);
			if(isset($_FILES['Productimage']['name']) && !empty($filter_img_array)){
				 $this->form_validation->set_rules('Productimage', 'Category Image', 'callback_image_upload');
			}

			if ($this->form_validation->run() !== FALSE)
            {
                $add =array();
    			$add['name'] = $this->input->post('name');
    			$add['price'] = $this->input->post('price');
    			$category_id = $this->input->post('category_id');
    			$add['shortDescription'] = $this->input->post('shortdescription');
    			$add['discountPrice'] = $this->input->post('dprice');
    			$add['dealofday'] = $this->input->post('dealofday');
    			$add['productCategoryId'] = $category_id;

    			$add['firstDescriptionTitle'] = $this->input->post('firstdescriptiontitle');
    			$add['fDescriptionBOne'] = $this->input->post('firstdescriptionbone');
    			$add['fDescriptoinBTwo'] = $this->input->post('firstdescriptionbtwo');
    			$add['fDescriptionBThree'] = $this->input->post('firstdescriptionbthree');

    			$add['secondDescriptionTitle'] = $this->input->post('seconddescriptionbone');
    			$add['sDescriptionBOne'] = $this->input->post('seconddescriptionbone');
    			$add['sDescriptoinBTwo'] = $this->input->post('seconddescriptionbthree');
    			$add['sDescriptionBThree'] = $this->input->post('thirddescriptiontitle');


    			$add['thirdDescriptionTitle'] = $this->input->post('thirddescriptiontitle');
    			$add['tDescriptionBOne'] = $this->input->post('thirddescriptionbone');
    			$add['tDescriptoinBTwo'] = $this->input->post('thirddescriptionbtwo');
    			$add['tDescriptionBThree'] = $this->input->post('thirddescriptionbthree');

    			$insert=$this->product_model->insert_entry($add);
    			if($insert){

    				if($product_cat_id = $this->product_cat_model->insert_entry(array('productId'=>$insert,'categoryId'=>$category_id))){

    				if(!empty($this->upload_data)){

    					foreach ($this->upload_data as $key => $img) {
    						$upload_img_name = $img['file_name'];
    						$img_id = $this->img_model->insert_entry(array('name'=>$add['name'],'imageUrl'=>$upload_img_name));
    						$product_img_id = $this->product_img_model->insert_entry(array('productId'=>$insert,'imageId'=>$img_id));	

    					}
    				}
    				
    				redirect('/product/index', 'refresh');
    				}
    			}
            }
        $data['post'] = $this->input->post();
		}
	$data['parent_cat'] = $this->category_model->GetCriteria();
	$this->load->view('product/add',$data);
	}

	public function edit(){
		$product_id =$this->uri->segment(3);
		$product = $this->product_model->GetCriteria(array('id'=>$product_id));
		$data['parent_cat'] = $this->category_model->GetCriteria();

		if(isset($product[0])){
			$product = $product[0];
			$data['post'] = $product;
			$data['product_image'] =  $this->img_model->getProductImages($product_id);
			if($this->input->post('edit')){

				$this->form_validation->set_rules('category_id', 'Category', 'required|trim');
				$this->form_validation->set_rules('name', 'Name', 'required|trim');
				$this->form_validation->set_rules('price', 'Price', 'required|trim');
				$this->form_validation->set_rules('dealofday', 'Deal of the day', 'required|trim');
				$this->form_validation->set_rules('shortdescription', 'Short Description', 'required|trim');
				$filter_img_array = array_filter($_FILES['Productimage']['name']);
				if(isset($_FILES['Productimage']['name']) && !empty($filter_img_array)){
					 $this->form_validation->set_rules('Productimage', 'Category Image', 'callback_image_upload');
				}
				if ($this->form_validation->run() !== FALSE)
	            {
					$edit =array();
		            $edit['name'] = $this->input->post('name');
					$edit['price'] = $this->input->post('price');
					$category_id = $this->input->post('category_id');
					$edit['shortDescription'] = $this->input->post('shortdescription');
					$edit['discountPrice'] = $this->input->post('dprice');
					$edit['dealofday'] = $this->input->post('dealofday');
					$edit['productCategoryId'] = $category_id;
					$edit['firstDescriptionTitle'] = $this->input->post('firstdescriptiontitle');
					$edit['fDescriptionBOne'] = $this->input->post('firstdescriptionbone');
					$edit['fDescriptoinBTwo'] = $this->input->post('firstdescriptionbtwo');
					$edit['fDescriptionBThree'] = $this->input->post('firstdescriptionbthree');

					$edit['secondDescriptionTitle'] = $this->input->post('seconddescriptionbone');
					$edit['sDescriptionBOne'] = $this->input->post('seconddescriptionbone');
					$edit['sDescriptoinBTwo'] = $this->input->post('seconddescriptionbthree');
					$edit['sDescriptionBThree'] = $this->input->post('thirddescriptiontitle');


					$edit['thirdDescriptionTitle'] = $this->input->post('thirddescriptiontitle');
					$edit['tDescriptionBOne'] = $this->input->post('thirddescriptionbone');
					$edit['tDescriptoinBTwo'] = $this->input->post('thirddescriptionbtwo');
					$edit['tDescriptionBThree'] = $this->input->post('thirddescriptionbthree');


					if(!empty($this->upload_data)){

						$this->product_img_model->delete_img($product_id);

						foreach ($this->upload_data as $key => $img) {
						$upload_img_name = $img['file_name'];

						$img_id = $this->img_model->insert_entry(array('name'=>$edit['name'],'imageUrl'=>$upload_img_name));

						$product_img_id = $this->product_img_model->insert_entry(array('productId'=>$product_id,'imageId'=>$img_id));

						}
					}
					
					if($this->product_model->update_entry($product_id,$edit))
						 redirect('/product/index', 'refresh');
				}

			}
			$this->load->view('product/edit',$data);
		}else{
			redirect('/product/index', 'refresh');
		}

	}

	public function image_upload()
	{
		if(!empty($_FILES['Productimage']['name'])){
			$count = count($_FILES['Productimage']['name']);
			for ($i=0; $i <$count ; $i++) { 

				$_FILES['virtual_img']['name'] = $_FILES['Productimage']['name'][$i];
                $_FILES['virtual_img']['type'] = $_FILES['Productimage']['type'][$i];
                $_FILES['virtual_img']['tmp_name'] = $_FILES['Productimage']['tmp_name'][$i];
                $_FILES['virtual_img']['error'] = $_FILES['Productimage']['error'][$i];
                $_FILES['virtual_img']['size'] = $_FILES['Productimage']['size'][$i];

				$config['upload_path']          = './uploads/product_image/';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        $config['max_size']             = 2048;
		        
		        $this->load->library('upload', $config);
		        if ( ! $this->upload->do_upload('virtual_img'))
		        {
		            $this->form_validation->set_message('image_upload', $this->upload->display_errors());
		            return false;
		        }
		        else
		        {
		            $this->upload_data[] =  $this->upload->data();
		            
		        }
			}
		}
		return true;
		
	}

	public function delete(){
		$product_id =$this->uri->segment(3);
		$productids = $this->product_img_model->GetCriteria(array('productId'=>$product_id));
		if(isset($productids)&&!empty($productids)){

			foreach ($productids as $key => $pro_id) {
				$this->img_model->delete($pro_id['imageId']);
				$this->product_model->delete($pro_id['productId']);
			}
			if($this->product_img_model->delete_img($product_id)){
				redirect('/product/index', 'refresh');
			}

		}
	}
}
