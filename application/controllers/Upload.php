<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('upload_model');
	}

	/*
	* Load File Upload Page
	*/
	public function index()
	{
		$data = array(
						'title' => 'CI File Upload',
						'message' => ''
					);
		$this->load->view('upload/index',$data);
	}

	/*
	* Upload File function
	*/
	public function do_upload(){
		$status = '';
		$message = '';
		//echo '<pre>';print_r($this->input->post());
		//echo '<pre>';print_r($_FILES);
		$fileName = $this->input->post('file-name');
		if(empty($fileName)){
			$status = 'error';
			$message = 'Please enter file name';
			$data = array(
						'title' => 'CI File Upload',
						'message' => $message
					);

			$this->load->view('upload/index',$data);
		}

		if($status != 'error'){
			$config['upload_path'] = './assets/uploaded_files/';
			$config['max_size'] = 1024*8;
			$config['allowed_types'] = 'pdf|doc|docx|xlx|xlxs|ppt|txt';
			$config['encrypt_name'] = FALSE;

			//Load library
			$this->load->library('upload',$config);

			if(!$this->upload->do_upload()){
				$status = 'error';
				$message = $this->upload->display_errors();
				$data = array(
						'title' => 'CI File Upload',
						'message' => $message
					);

				$this->load->view('upload/index',$data);
			}
			else{
				$data = $this->upload->data();
				$uploadedFileName = $data['file_name'];
				$filePath = 'assets/uploaded_files/'.$uploadedFileName;
				$result = $this->upload_model->saveFile($fileName,$filePath);
				$status = 'success';
				$message = 'File uploaded';
				
				$data = array(
						'title' => 'CI File Upload',
						'message' => $message
					);

				$this->load->view('upload/index',$data);

			}
		}
	}

	/*
	* List Files
	*/
	public function filelist(){
		$result = $this->upload_model->getAllFiles();
		$data = array(
						'title' => 'CI File Upload',
						'message' => '',
						'fileList' => $result
					);
		$this->load->view('upload/list',$data);
	}

	/*
	* Delete file
	*/
	public function delete($id){
		$result = $this->upload_model->deleteFile($id);
		if($result){
			$message = "file deleted";
			redirect('upload/filelist');
		}
	}
}
