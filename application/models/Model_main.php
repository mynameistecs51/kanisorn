<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Model_main extends CI_model{

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}

	function insert_dataUniversity(){
		$data_insert = array(
			'uni_id' => '',
			'uni_data' => $this->input->post('universityData'),
			);
		$this->db->insert('university',$data_insert);
		return TRUE;
	}

	function get_University(){
		$get_University = $this->db->order_by('uni_id','DESC')->get('university')->result();
		return $get_University;
	}

	function update_uni(){
		$uni_id = $this->input->post('uni_id');
		$uni_data = $this->input->post('universityData');
		$this->db->where('uni_id',$uni_id);
		$this->db->update('university',array('uni_data' => $uni_data));
		return TRUE;

	}

	function delete_universityID($uni_id){
		$this->db->where('uni_id',$uni_id);
		$this->db->delete('university');
		return TRUE;
	}

	function insert_doc($name_file){
		$data_insert = array(
			'file_docId' =>'',
			'file_subName' => $this->input->post('input_docName'),
			'file_docPath' => $name_file,
			'file_docDetail' => $this->input->post('input_docDetail'),
			);
		$this->db->insert('file_document',$data_insert);
	}

	function upload_fileDoc(){  //upload file process
		$file_name =  date('d_m_y_H_i_s');
		$config['upload_path'] =  './files_upload/file_document';
		// die(var_dump(is_dir($config['upload_path'])));
		$config['allowed_types'] = 'doc|docx|pdf|jpg|jpeg|png|';
		$config['max_size'] = '7000';	// 7mb
		$config['file_name'] = $file_name.$_FILES['file_doc']['name'];		//fiel_name
		$config['remove_spaces'] = TRUE;

		$name_file = $config['file_name'] = $file_name.$_FILES['file_doc']['name'];		//fiel_name

		$this->load->library("upload",$config);		//library upload
		$this->upload->initialize($config);
		if($this->upload->do_upload('file_doc')){	//ถ้า upload ไม่มีปัญหา

			$this->Model_main->insert_doc($name_file);
			return TRUE;

		}else{
			// echo $this->upload->display_errors()."error_doc  ";
			// return FALSE;
			$data = array(
				'active' => "document",
				'show_doc' => $this->Model_main->get_doc(),
				'file_error' => 'กรุณาเลือกไฟล์',
				);
			$this->load->view('admin/manage_document',$data);
		}

		return true;
	}

	function update_file($file_docId){
		$file_name =  date('d_m_y_H_i_s');
		$db_query = $this->db->query('SELECT * FROM file_document WHERE file_docId='.$file_docId)->result();
		foreach ($db_query as $row_fileDoc) {
			unlink('./files_upload/file_document/'.$row_fileDoc->file_docPath);		//ลบรูปเก่าออก
		}

		$config['upload_path'] =  './files_upload/file_document';
		$config['allowed_types'] = 'doc|docx|pdf|jpg|jpeg|png|';
		$config['max_size'] = '7000';		// 7mb
		$config['file_name'] = $file_name.$_FILES['file_doc']['name'];		//fiel_name
		$config['remove_spaces'] = TRUE;

		$this->load->library("upload",$config);		//library upload
		$this->upload->initialize($config);
		if($this->upload->do_upload('file_doc')){	//ถ้า upload ไม่มีปัญหา
			$data_update = array(
				'file_subName' => $this->input->post('input_docName'),
				'file_docPath' => $file_name.$_FILES['file_doc']['name'],
				'file_docDetail' => $this->input->post('input_docDetail'),
				);
			$this->db->where('file_docId',$file_docId);
			$this->db->update('file_document',$data_update);
			return TRUE;
		}else{
			// echo $this->upload->display_errors()."error_doc  ";
			// return FALSE;
			$data = array(
				'active' => "document",
				'show_doc' => $this->Model_main->get_doc(),
				'file_error' => $this->upload->display_errors(),
				);
			$this->load->view('admin/manage_document',$data);
		}

		return true;
	}

	function update_fileDoc($file_docId){
		$data_update = array(
			'file_subName' => $this->input->post('input_docName'),
			'file_docDetail' => $this->input->post('input_docDetail'),
			);
		$this->db->where('file_docId',$file_docId);
		$this->db->update('file_document',$data_update);
		return true;
	}

	function get_doc(){
		$get_doc = $this->db->get('file_document')->result();
		return $get_doc;
	}

	function delete_fileDoc($doc_id){

		$this->db->where('file_docId',$doc_id);
		$query =$this->db->get('file_document',0,0)->result();
		foreach ($query as $row_fileDoc) {
			$id =  $row_fileDoc->file_subName;
			$file_name = $row_fileDoc->file_docPath;
		}
		unlink('./files_upload/file_document/'.$file_name);	//delete file
		$this->db->where('file_docId',$doc_id);
		$this->db->delete('file_document');
		return TRUE;
	}

	function get_tableTeacher(){
		$get_tableTeacher = $this->db->get('table_teacher')->result();
		return $get_tableTeacher;
	}

	function insert_Research($filed , $file){  		//upload multi file picture  // require filed name & files name

		$date = date("d_m_y_H_i");
		$name_array = array();
		$count = count($_FILES[$filed]['name']);

		foreach($_FILES as $key => $value){
			for($s=0; $s < $count; $s++) {

				$_FILES[$filed]['name'] = $date.substr($value['name'][$s],-5);
				$_FILES[$filed]['type']    = $value['type'][$s];
				$_FILES[$filed]['tmp_name'] = $value['tmp_name'][$s];
				$_FILES[$filed]['error']       = $value['error'][$s];
				$_FILES[$filed]['size']    = $value['size'][$s];
				$config['upload_path'] = './files_upload/file_research/';
				$config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf|ppt|pptx';
				$this->load->library('upload', $config);
				$this->upload->do_upload($filed);
				$data = $this->upload->data();
				$name_array[] = $data['file_name'];
			}
		}
		$names_research = implode(',', $name_array);
		/*
		 $this->load->database();
		$db_data = array('id'=> NULL,
		'name'=> $names);
		$this->db->insert('testtable',$db_data);
		*/
		return $names_research;
	}

	function get_research(){
		$research = $this->db->get('research');
		return $research;
	}

}

?>