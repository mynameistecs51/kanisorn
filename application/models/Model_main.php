<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Model_main extends CI_model{
	public function __construct(){
		parent::__construct();
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
	function insert_doc(){
		$data_fileProject = $this->upload->data();
		$data_insert = array(
			'file_docId' =>'',
			'file_subName' => $this->input->post('input_docName'),
			'file_docPath' => $_FILES['file_doc']['name'],
			'file_docDetail' => $this->input->post('input_docDetail'),
			);
		$this->db->insert('file_document',$data_insert);
	}

	function upload_fileDoc(){  //upload file process

		$config['upload_path'] =  './files_upload/file_document';
		// die(var_dump(is_dir($config['upload_path']))); 
		$config['allowed_types'] = 'doc|docx|pdf|jpg|jpeg|png|';
		$config['max_size'] = '7000';	// 7mb
		$config['file_name'] = $_FILES['file_doc']['name'];		//fiel_name
		$config['remove_spaces'] = TRUE;

		$this->load->library("upload",$config);		//library upload
		$this->upload->initialize($config);
		if($this->upload->do_upload('file_doc')){	//ถ้า upload ไม่มีปัญหา

			$this->Model_main->insert_doc();
			return TRUE;

		}
		else{
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

		}

		?>