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
			);
		$this->load->view('admin/manage_research',$data);
	}

	function insert_research(){
		echo "<pre>";
		print_r($_FILES['files_pic']);
		$name_array = array();

		$count = count($_FILES['files_pic']['size']);
		foreach($_FILES as $key=>$value)
			for($s=0; $s<=$count-1; $s++) {
				$_FILES['files_pic']['name']='xx'.$value['name'][$s];
				$_FILES['files_pic']['type']    = $value['type'][$s];
				$_FILES['files_pic']['tmp_name'] = $value['tmp_name'][$s];
				$_FILES['files_pic']['error']       = $value['error'][$s];
				$_FILES['files_pic']['size']    = $value['size'][$s];
				$config['upload_path'] ='./files_upload/file_picture/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('files_pic');
				$data = $this->upload->data();
				$name_array[] = $data['file_name'];

		}
		$names= implode(',', $name_array);
			/* $this->load->database();
			$db_data = array('id'=> NULL,
			'name'=> $names);
			$this->db->insert('testtable',$db_data);
			*/
			print_r($names);
		}

	/*function insert_research(){
		$rand = rand(1111,9999);
		$date= date("d_m_y_H_i");
		$name_picture = '';
		$file_namePic = array();
		$xx = "";
		for($i= 0 ; $i < count($_FILES['files_pic']['name']) ; $i++ ){
			$xx .= trim($date.$_FILES['files_pic']['name'][$i].",");

		}
		$b = substr($xx,0,-1);
		$file_namePic = explode(',',$b);
		//print_r($file_namePic);
		//echo explode(',',$file_namePic);
		$config['upload_path'] ='./files_upload/file_picture/';
		$config['allowed_types'] = '*';
		$config['max_size']	= 0;

		//$config['encrypt_name'] = TRUE;
		$config['remove_spaces'] = TRUE;
		//$file_name =$_FILES['images']['name'];

		$this->load->library('upload');
		$this->upload->initialize($config);


	//$config['file_name'] =$name_picture;//----------------file_name
		if($_FILES['files_pic']){
			$images= $this->_upload_files('files_pic');
			foreach ($images as $key => $value) {
			# code...
			//print_r($_FILES['files_pic']);
				$name_picture .=$value['file_name'].',';		//------------./ show list name picture./---------//
				//print_r($value);
				//print_r($this->upload->data());
			}
			//$config['file_name'] = $HTTP_POST_FILES[$name_picture];
			echo "<pre>";
			print_r($name_picture);
		}

	}

	private function _upload_files($field='files_pic'){
		$date = date('d-m-y');
		$files = array();
		foreach( $_FILES[$field] as $key => $all )
			foreach( $all as $i => $val ){
				$files[$i][$key] =  $val;

			}


			$files_uploaded = array();
			for ($i=0; $i < count($files); $i++) {
				$_FILES[$field] = $files[$i];
				if ($this->upload->do_upload($field)){
					$files_uploaded[$i] = $this->upload->data();
				}
				else{
					$files_uploaded[$i] = null;
				}
			}
			return $files_uploaded;
		}
*/

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