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
			'get_university' => $this->Model_main->get_University(),
			);
		$this->load->view('admin/manage_history',$data);
	}

	public function add_uniData(){  //add data university

		$this->form_validation->set_rules('universityData','universityData','trim|required|xss_clean');
		$this->form_validation->set_message('required', '::กรุณากรอกรายละเอียด ::');

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/manage_history');
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
			);
		$this->load->view('document',$data);
	}
	public function mngDocument(){	//management data document
		$data = array(
			'active' => "document",
			);
		$this->load->view('admin/manage_document',$data);
	}

	public function add_document(){
		if($_FILES['file_doc']['name'] !== FALSE){
			$this->Model_main->upload_fileDoc();	//upload document file --> function upload_fileDoc()
			redirect('Welcome/mngDocument','refresh');
		}else{
			echo "no file";
		}
	}


	public function contact(){	//show contact
		$data = array(
			'active' => 'contact',
			);
		$this->load->view('contact',$data);
	}
}
