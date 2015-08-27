<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_main','',TRUE);
	}

	public function index(){
		$data = array(
			'active' => "history",	//select menu active
			'get_university' => $this->Model_main->get_University(),
			);

		$this->load->view('index',$data);
	}

	public function management(){  //management page
		$data = array(
			'active' => "history",
			'get_university' => $this->Model_main->get_University(),
			);
		$this->load->view('admin/manage_history',$data);
	}

	public function add_uniData(){  //add data university

		$this->form_validation->set_rules('universityData','universityData','trim|required|xss_clean');
		$this->form_validation->set_message('required', '::กรุณากรอกรายละเอียด ::');

		$data = array(
			'active' => "history",
			'get_university' => $this->Model_main->get_University(),
			);

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/manage_history',$data);
			return FALSE;
		}else{
			$this->Model_main->insert_dataUniversity();
		}
		redirect('Welcome/management','refresh');
	}

	public function update_uni(){  //update data university
		$this->Model_main->update_uni();
		redirect('Welcome/management','refresh');
	}

	public function delete_uniID($uni_id){ //delete data university
		$this->Model_main->delete_universityID($uni_id);
		redirect('Welcome/management','refresh');
	}

	public function  document(){  //show document
		$data =array(
			'active' => "document",
			'show_doc' => $this->Model_main->get_doc(),
			);
		$this->load->view('document',$data);
	}

	public function mngDocument(){	//management data document
		$data = array(
			'active' => "document",
			'show_doc' => $this->Model_main->get_doc(),
			);
		$this->load->view('admin/manage_document',$data);
	}

	public function add_document(){
		//$this->form_validation->set_rules('file_doc','file_doc','required');
		$this->form_validation->set_rules('input_docName','input_docName','required');
		$this->form_validation->set_message('required', '::กรุณากรอกรายละเอียด ::');


		if( $this->form_validation->run() === FALSE ){
			$this->mngDocument();	//load function mngDocument()
			return false;
		}else{
			$this->Model_main->upload_fileDoc();		//upload document file --> function upload_fileDoc()
			$this->mngDocument();		//load function mngDocument()
		}
		redirect('Welcome/mngDocument','refresh');
	}

	public function del_docID($doc_id=""){
		if(!$doc_id){
			redirect('Welcome/mngDocument','refresh');
			return false;
		}else{
			$this->Model_main->delete_fileDoc($doc_id);
			redirect('Welcome/mngDocument','refresh');
		}
	}
	public function update_document(){
		$file_docId = $this->input->post('file_docId');

		if(!empty($_FILES['file_doc']['name'])){
			$this->Model_main->update_file($file_docId);
			$this->mngDocument();
		}elseif($file_docId != null ){
			$this->Model_main->update_fileDoc($file_docId);
			//$this->mngDocument();
		}else{
			redirect('Welcome/mngDocument','refresh');
		}
	}

	public function mngResearch(){	//management research
		$data = array(
			'active' => "research",
			);
		$this->load->view('admin/manage_research',$data);
	}

	function insert_research(){
		$date = date('d-m-y');
		$file_namePic = array();
		for($i = 0; $i < count($_FILES['files_pic']['name']); $i++){
			//$file_namePic = array($date.$_FILES['files_pic']['name'][$i]);
			//$file_namePic .= implode(',',$_FILES['files_pic']['name']);
			//print_r($file_namePic);
		}
		$xx = "";
		for($i= 0 ; $i < count($_FILES['files_pic']['name']) ; $i++ ){
			$xx .= trim($date.$_FILES['files_pic']['name'][$i].",");

		}
		$b = substr($xx,0,-1);
		$file_namePic = explode(',',$b);
		//echo explode(',',$file_namePic);
		$config['upload_path'] ='./files_upload/file_picture/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|';
		$config['file_name'] = $file_namePic;
		$config['max_size']	= '50'; //MB

		$this->load->library("upload",$config);		//library upload
		$this->upload->initialize($config);
	//$config['file_name'] =$name_picture;//----------------file_name
		if($this->upload->do_upload('files_pic')){
			//$images= $this->_upload_files();
			$data_research  = array(
				'res_id' => '',
				'res_name' => $this->input->post('input_docName'),
				'res_file' => $_FILES['file_doc']['name'],
				'file_pic' => $file_namePic,
				'res_detail' => $this->input->post('input_docDetail'),
				'res_type' => $this->input->post('research_type'),
				);

			print_r($data_research);
		}else{
			echo "upload faile";
			echo $this->upload->display_errors();
			print_r($config);
		}
	}

	private function _upload_files(){		//upload file picture about research
		$files = array();
		$date = date('d-m-y');
		foreach ($_FILES['files_pic'] as $key => $all) {
			foreach ($all as $i => $val) {
				$files[$i][$key] = trim($date.$val);
			}
		}

		$files_uploaded = array();
		for ($i=0; $i < count($files); $i++) {
			$_FILES['files_pic'] = $files[$i];
			if ($this->upload->do_upload('files_pic'))
				$files_uploaded[$i] = $this->upload->data($files);
			else
				$files_uploaded[$i] = null;
		}
		return $files_uploaded;
	}

	public function research(){
		$data = array(
			'active' => "research",
			);
		$this->load->view('research',$data);
	}

	public function table_taecher(){
		$data = array(
			'active' => 'table_taecher',
			);
		$this->load->view('admin/mngTable',$data);
	}

	public function show_table(){
		$data = array(
			'active' => "table_taecher",
			'table_taecher' => $this->Model_main->get_tableTeacher(),
			);
		$this->load->view('table',$data);
	}

	public function contact(){	//show contact
		$data = array(
			'active' => 'contact',
			);
		$this->load->view('contact',$data);
	}

	public function download($file_name){		// download file project

		// $data = file_get_contents("images/file_project_doc/".$file_name); // Read the file's contents
		// $name = $file_name;
		// echo force_download($name,$data);
		$data = file_get_contents('./files_upload/file_document/'.$file_name);
		$name = $file_name;
		echo force_download($name,$data);
		redirect('Welcome/document','refresh');
	}

	public function read_file($file_name){
		$this->load->helper('file');
		// $data = file_get_contents(base_url().'files_upload/file_document/'.$file_name);
		$name = $file_name;
		echo $string = fopen(base_url().'files_upload/file_document/'.$name,'r');
	}

}
?>