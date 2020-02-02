<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	protected $upload_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	    $this->load->library('form_validation');


	}
	public function index()
	{
		$data = array();
		$data['category'] = $this->category_model->get_entries();
		$this->load->view('category/category',$data);
	}

	public function add()
	{	
		if($this->input->post('add')){
			$this->form_validation->set_rules('name', 'Category Name', 'required');
			$this->form_validation->set_rules('description', 'Category Description', 'trim');
			if(isset($_FILES['categoryimage']['name']) && !empty($_FILES['categoryimage']['name'])){
				 $this->form_validation->set_rules('categoryimage', 'Category Image', 'callback_image_upload');
			}
			if ($this->form_validation->run() !== FALSE)
            {
                $add =array();
    			$add['name'] = $this->input->post('name');
    			$add['isTopLevelCategory'] = $this->input->post('istoplevel');
    			$add['isParentCategory'] = $this->input->post('isparent');
    			if($add['isParentCategory']=='1'){
    				$add['parentCategoryId'] = $this->input->post('parent_cat_id');
    			}
    			$add['description'] = $this->input->post('description');
    			
    			if(isset($this->upload_data['cat_img'])){
    				$add['imageName'] = $this->upload_data['cat_img']['file_name'];
    			}

    			if($this->category_model->insert_entry($add))
    				 redirect('/category/index', 'refresh');
            }
		$data['post'] = $this->input->post();	
		}
	$data['parent_cat'] = $this->category_model->GetCriteria();
	$this->load->view('category/add_category',$data);
	}

	public function edit(){
		$cat_id =$this->uri->segment(3);
		$data['cat'] = $this->category_model->GetCriteria(array('id'=>$cat_id));
		$data['cat'] = $data['cat'][0];
		$data['parent_cat'] = $this->category_model->GetCriteria(array('isParentCategory'=>1));

		if($this->input->post('edit')){

			$this->form_validation->set_rules('name', 'Category Name', 'required');
			$this->form_validation->set_rules('description', 'Category Description', 'trim');
			if(isset($_FILES['categoryimage']['name']) && !empty($_FILES['categoryimage']['name'])){
				 $this->form_validation->set_rules('categoryimage', 'Category Image', 'callback_image_upload');
			}
			if ($this->form_validation->run() !== FALSE)
            {
				$edit =array();
				$edit['name'] = $this->input->post('name');
				$edit['isTopLevelCategory'] = $this->input->post('istoplevel');
				$edit['isParentCategory'] = $this->input->post('isparent');
				if($edit['isParentCategory']=='1'){
					$edit['parentCategoryId'] = $this->input->post('parent_cat_id');
				}else{
					$edit['parentCategoryId'] = '';
				}

				if(isset($this->upload_data['cat_img'])){
    				$edit['imageName'] = $this->upload_data['cat_img']['file_name'];
    			}

				$edit['description'] = $this->input->post('description');
				
				if($this->category_model->update_entry($cat_id,$edit))
					 redirect('/category/index', 'refresh');
			}

		}
		$this->load->view('category/edit',$data);
	}
	public function image_upload()
	{
		$config['upload_path']          = './uploads/cat_image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('categoryimage'))
        {
            $this->form_validation->set_message('image_upload', $this->upload->display_errors());
            return false;
        }
        else
        {
            $this->upload_data['cat_img'] =  $this->upload->data();
            return true;

        }
	}
	public function delete(){
		$cat_id =$this->uri->segment(3);
		$this->load->model('Product_model','product_model');
		$this->load->model('Product_Category_model','product_cat_model');
		$this->load->model('Product_Image_model','product_img_model');
		$this->load->model('Image_model','img_model');
		/*product category delete starts*/
		$productids = $this->product_cat_model->GetCriteria(array('categoryId'=>$cat_id));
		if(isset($productids)&&!empty($productids)){

			foreach ($productids as $key => $pro_id) {
				$this->product_model->delete($pro_id['productId']);
				$imgids = $this->product_img_model->GetCriteria(array('productId'=>$pro_id['productId']));
				if(isset($imgids)){
					foreach ($imgids as $key => $imgid) {
						$this->img_model->delete($imgid['imageId']);
					}
					$this->product_img_model->delete_img($pro_id['productId']);
				}
				$this->product_cat_model->delete($pro_id['id']);
			}
		}

		/*product category delete ends*/
		if($this->category_model->delete($cat_id)){
			redirect('/category/index', 'refresh');
		}
	}
}
