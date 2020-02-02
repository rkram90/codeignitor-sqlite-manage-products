<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('download/index');
	}

	public function downloadDB(){
		$this->load->helper('download');
		$pth    =   file_get_contents(base_url()."application/db/sqlite/confirmdb1.sqlite");
		$nme    =   date("Y_m_d_g:i a")."DB.sqlite";
		force_download($nme, $pth);  
	}

	public function downloadimg($value='')
	{

		$dir = FCPATH.'uploads';
		$zip_file = FCPATH.'imagezip/'.date("Y_m_d_g:i a").'_all_img.zip';

		// Get real path for our folder
		$rootPath = realpath($dir);
		$this->load->library('ZipFolders');

		$res = $this->zipfolders->open($zip_file, ZipArchive::CREATE);
		if($res === TRUE)    {
		    $this->zipfolders->addDir($rootPath, basename($rootPath)); 
		    $this->zipfolders->close();
		}
		else  {die('Could not create a zip archive');}

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($zip_file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($zip_file));
		readfile($zip_file);
	}
}
