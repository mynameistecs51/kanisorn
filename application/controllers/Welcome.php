<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
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
			'inter_research' => $this->Model_main->get_research(),
			);
		$this->load->view('admin/manage_research',$data);
	}

	public function research(){
		$data = array(
			'active' => "research",
			);
		$this->load->view('research',$data);
	}


	function insert_research(){

		if($_FILES['file_research'] !=''){
			$upload_research = $this->Model_main->insert_Research('file_research',$_FILES['file_research']);
			$name ="";
			// foreach ($upload_research as $key => $value) {
			$a = explode(',',$upload_research);
			for($i = 1 ; $i < count($a) ; $i++){
				$name .= $a[$i].',';
			}
			$insert_research = array(
				'res_name' => $this->input->post('input_docName'),
				'res_file' => $a[0],
				'res_pict' => substr($name,0,-1),
				'res_detail' => $this->input->post('input_docDetail'),
				'res_type' => $this->input->post('research_type'),
				);
			$this->db->insert('research',$insert_research);
		}
		$this->mngResearch();

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