<?php 
class Upload_model extends CI_model{
	function __construct(){
		parent::__construct();
	}

	/*
	* Save file
	*/
	public function saveFile($fileName, $filePath){
		$data = array(
						'file_name' => $fileName,
						'file_path' => $filePath,
						'status' => '1',
						'created_at' => date("Y-m-d H-i-s"),
						'updated_at' => date("Y-m-d H-i-s")
					);

		$this->db->insert('ci_files',$data);
		$lastInsertedId = $this->db->insert_id();
		return $lastInsertedId;
	}

	/*
	* Get all files
	*/
	public function getAllFiles(){
		$this->db->select('ci_files.*');
		$this->db->from('ci_files');
		$this->db->order_by('ci_files.updated_at','DESC');
		$query = $this->db->get();

		$fileList = array();
		if($query->num_rows() > 0){
			$fileList = $query->result_array();
		}
		return $fileList;
	}

	/*
	* Get File
	*/
	public function getFile($fileId){
		$result = $this->db->select()
							->from('ci_files')
							->where('id',$fileId)
							->get()
							->row();

		return $result;
	}

	/*
	* Delete File
	*/
	public function deleteFile($fileId){
		$fileData = $this->getFile($fileId);
		$result = $this->db->where('id',$fileId)->delete('ci_files');
		if($result){
			unlink($fileData->file_path);
			return true;
		}
		else{
			return false;
		}
	}
}