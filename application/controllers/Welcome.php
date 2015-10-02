
<?php   defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
		$this->load->model('Model_main','',TRUE);
		$this->load->model('Login','',TRUE);

	}

	public function index(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		foreach ($this->db->where('user_fb',$fb_data['uid'])->get('username')->result() as  $value) {
			$status = $value->user_status;
		}

		$data = array(
			'active' => "history",	//select menu active
			'get_university' => $this->Model_main->get_University(),
			'fb_data' =>$fb_data,
			);
		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}elseif ($this->Login->checkID_first($fb_data) <= 0) {
			$data_fb = array(
				'user_fb' => $fb_data['uid'],
				'user_fbName' => $fb_data['me']['name'],
				'user_email' => $fb_data['me']['email'],
				'user_status' => 'public',
				);
			$this->db->insert('username',$data_fb);

			redirect('Welcome/document','refresh');
		}elseif($status == 'admin') {
			redirect('Welcome/management','refresh');
		}else{
			$this->load->view('index',$data);
		}
	}

	public function index_page()
	{
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		$data = array(
			'active' => "history",	//select menu active
			'get_university' => $this->Model_main->get_University(),
			'fb_data' =>$fb_data,
			);
		$this->load->view('index',$data);
	}

	public function management(){  //management page
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		$data = array(
			'active' => "history",
			'get_university' => $this->Model_main->get_University(),
			'fb_data' => $fb_data,
			);
		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{

			$this->load->view('admin/manage_history',$data);
		}
	}

	public function add_uniData(){  //add data university
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		$data = array(
			'active' => "history",
			'get_university' => $this->Model_main->get_University(),
			'fb_data' => $fb_data,
			);
		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$this->form_validation->set_rules('universityData','universityData','trim|required|xss_clean');
			$this->form_validation->set_message('required', '::กรุณากรอกรายละเอียด ::');


			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/manage_history',$data);
				return FALSE;
			}
			$this->Model_main->insert_dataUniversity();
		}
		redirect('Welcome/management','refresh');
	}

	public function update_uni(){  //update data university
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$this->Model_main->update_uni();
			redirect('Welcome/management','refresh');
		}
	}

	public function delete_uniID($uni_id){ //delete data university
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$this->Model_main->delete_universityID($uni_id);
			redirect('Welcome/management','refresh');
		}
	}

	public function  document($value=''){  //show document
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		if($value == ""){

			$data =array(
				'active' => "document",
				'show_doc' => $this->db->query('SELECT * FROM file_document INNER JOIN subjects ON file_document.subj_id=subjects.subj_id ')->result(),
				'fb_data' => $fb_data,
				'show_subj' => $this->db->query('SELECT  * FROM subjects')->result(),

				);
		}else{
			$data =array(
				'value' => $value,
				'active' => "document",
				//'show_doc' => $this->Model_main->get_doc(),
				'fb_data' => $fb_data,
				'show_subj' => $this->db->query('SELECT  * FROM subjects')->result(),
				'show_doc' =>$this->db->query('SELECT * FROM file_document INNER JOIN subjects ON file_document.subj_id=subjects.subj_id WHERE file_document.subj_id ='.$value)->result(),
				);

		}
		$this->load->view('document',$data);
	}

	public function mngDocument(){	//management data document
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if($fb_data['uid'] =="")
		{
			//$this->load->view('index',$data);
			redirect('Welcome','refresh');

		}else{
			$data = array(
				'active' => "document",
				'show_doc' => $this->Model_main->get_doc(),
				'show_subj' => $this->db->get('subjects')->result(),
				'fb_data' => $fb_data,
				);
			$this->load->view('admin/manage_document',$data);
		}
	}

	public function add_document(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
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
	}

	public function del_docID($doc_id=""){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			if(!$doc_id){
				redirect('Welcome/mngDocument','refresh');
				return false;
			}
			$this->Model_main->delete_fileDoc($doc_id);
			redirect('Welcome/mngDocument','refresh');

		}
	}

	public function update_document(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$file_docId = $this->input->post('file_docId');

			if(!empty($_FILES['file_doc']['name'])){
				$this->Model_main->update_file($file_docId);
				$this->mngDocument();
			}elseif($file_docId != null ){
				$this->Model_main->update_fileDoc($file_docId);
			//$this->mngDocument();
			}
			redirect('Welcome/mngDocument','refresh');

		}
	}

	public function mngResearch(){	//management research
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$data = array(
				'active' => "research",
				'inter_research' => $this->Model_main->get_research(),
				'fb_data' => $fb_data,
				);
			$this->load->view('admin/manage_research',$data);
		}
	}

	public function research(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		$data = array(
			'active' => "research",
			'fb_data' => $fb_data,
			);
		$this->load->view('research',$data);
	}


	function insert_research(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			if($_FILES  != null){
				$upload_research = $this->Model_main->insert_Research('file_research',$_FILES['file_research']);
				$name ="";
			// foreach ($upload_research as $key => $value) {
				$a = explode(',',$upload_research);
				for($i = 1 ; $i < count($a) ; $i++){
					$name .= $a[$i].',';
				}
				$insert_research = array(
					'res_name' => $this->input->post('input_resName'),
					'res_file' => $a[0],
					'res_pict' => substr($name,0,-1),
					'res_detail' => $this->input->post('input_docDetail'),
					'res_type' => $this->input->post('research_type'),
					);
				$this->db->insert('research',$insert_research);

			}
			redirect('Welcome/mngResearch','refresh');
		}

	}

	public function update_research(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$this->Model_main->update_research();
			redirect('Welcome/mngResearch','refresh');
		}
	}

	public function del_research($value=''){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			if(!$value){
				redirect('Welcome/mngResearch','refresh');
				return false;
			}
			$this->Model_main->delete_research($value);
			redirect('Welcome/mngResearch','refresh');
		}
	}

	public function mngTable(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$data = array(
				'active' => 'taecher',
				'fb_data' => $fb_data,
				);
			$this->load->view('admin/mngTable',$data);
		}
	}

	public function insert_table()
	{
			$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

			if((!$fb_data['uid']) or (!$fb_data['me']))
			{
				$this->load->view('index',$data);

			}else{
				$this->form_validation->set_rules('num_trem','num_trem','required');

				if( $this->form_validation->run() === FALSE ){
					$this->mngTable();	//load function mngDocument()
					return false;
				}else{
				$this->Model_main->upload_fileTable();		//upload document file --> function upload_fileDoc()
				$this->mngTable();		//load function mngDocument()
			}
			redirect('Welcome/mngTable','refresh');
		}
	}

	public function update_table()
	{
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			$value = $this->input->post('value');
			unlink('./files_upload/file_picture/'.$value);
			$this->Model_main->update_table( $value );
			redirect('Welcome/mngTable','refresh');
		}
	}

	public function delete_table($value='')
	{
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			$this->load->view('index',$data);

		}else{
			unlink('./files_upload/file_picture/'.$value);
			$this->db->where('table_name',$value)->delete('table_teacher');
			redirect('Welcome/mngTable','refresh');
		}
	}

	public function show_table(){
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		$data = array(
			'active' => "table_taecher",
			'table_taecher' => $this->Model_main->get_tableTeacher(),
			'fb_data' => $fb_data,
			);
		$this->load->view('table',$data);
	}

	public function contact(){	//show contact
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		$data = array(
			'active' => 'contact',
			'fb_data' => $fb_data,
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
		echo  $string = fopen(base_url().'files_upload/file_document/'.$file_name,'r');
		// redirect(base_url().'files_upload/file_document/'.$file_name,'refresh');
	}

	public function logout()
	{
		$this->Login->logout();
	}

	public function mngPiture_Profile()
	{
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
		$data = array(
			'active' => 'pictureProfile',
			'fb_data' => $fb_data,
			);
		$this->load->view('admin/mngProfile_picture',$data);
	}

	public function insert_picturePofile()
	{
		$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information

		if(!$fb_data['uid'])
		{
			$data = array('fb_data'=>$fb_data,);
			$this->load->view('index',$data);
		}else{
			$file_name =  date('d_m_y_H_i_s');
			$config['upload_path'] =  './picture/picProfile/';
			$config['allowed_types'] = 'jpg|jpeg|png|';
			$config['file_name'] = $file_name.'.'.substr($_FILES['picture_profile']['name'],-4);		//file_name
			//$config['remove_spaces'] = TRUE;

			$this->load->library("upload",$config);		//library upload
			$this->upload->initialize($config);
			if($this->upload->do_upload('picture_profile')){	//ถ้า upload ไม่มีปัญหา
				$insert_picture = array(
					'picPro_name' => $this->upload->data('file_name'),
					);
				$this->db->insert('picture_profile',$insert_picture);
			}else{
				print_r($this->upload->display_errors());
			}
			redirect('Welcome/mngPiture_Profile','refresh');
		}
		redirect('Welcome/mngPiture_Profile','refresh');
	}

	public function update_picProfile()
	{
		$file_name = $this->db->where('picPro_id',$this->input->post('value_id'))->get('picture_profile')->result();
		foreach ($file_name as $row_fileName) {
			unlink('./picture/picProfile/'.$row_fileName->picPro_name);

		}
		$file_name =  date('d_m_y_H_i_s');
		$config['upload_path'] =  './picture/picProfile';
		$config['allowed_types'] = 'jpg|jpeg|png|';
			$config['file_name'] = $file_name.'.'.substr($_FILES['file_picture']['name'],-4);		//file_name
			//$config['remove_spaces'] = TRUE;

			$this->load->library("upload",$config);		//library upload
			$this->upload->initialize($config);
			if($this->upload->do_upload('file_picture')){	//ถ้า upload ไม่มีปัญหา
				$update_picture = array(
					'picPro_name' => $this->upload->data('file_name'),
					);
				$this->db->where('picPro_id',$this->input->post('value_id'));
				$this->db->update('picture_profile',$update_picture);

			}else{
				return $this->upload->display_errors();
			}
			redirect('Welcome/mngPiture_Profile','refresh');

		}

		public function delete_picProfile($value='')
		{
			unlink('./picture/picProfile/'.$value);
			$this->db->where('picPro_name',$value)->delete('picture_profile');
			redirect('Welcome/mngPiture_Profile','refresh');
		}

		public function mngPicture_slide()
		{
			$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
			$data = array(
				'active' => 'pictureSlide',
				'fb_data' => $fb_data,
				);
			$this->load->view('admin/mngPicture_slide',$data);
		}

		public function insert_pictureSlide()
		{
			$pic_slide = $this->Model_main->upload_picSlide('picture_slide');
			$this->db->insert('picture_slide',array('picSlide_name' => $pic_slide));
			redirect('Welcome/mngPicture_slide','refresh');
		}

		public function delet_slide($value='')
		{
			$picture = $this->db->where('picSlide_id',$value)->get('picture_slide')->result();
			foreach ($picture as $row_slide) {
				$name_slide = explode(',',$row_slide->picSlide_name);
				for($i=0;$i < count($name_slide);$i++){
					unlink('./picture/slides/'.$name_slide[$i]);
				}
			}
			$this->db->where('picSlide_id',$value);
			$this->db->delete('picture_slide');
		}

		public function update_slide()
		{
			$picture = $this->db->where('picSlide_id',$this->input->post('value_id'))->get('picture_slide')->result();
			foreach ($picture as $row_slide) {
				$name_slide = explode(',',$row_slide->picSlide_name);
				for($i=0;$i < count($name_slide);$i++){
					unlink('./picture/slides/'.$name_slide[$i]);
				}
			}
			$pic_slide = $this->Model_main->upload_picSlide('picture_slide');
			$this->db->update('picture_slide',array('picSlide_name' => $pic_slide));
			redirect('Welcome/mngPicture_slide','refresh');
		}

		public function mngsubjects()
		{
			$fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
			$data = array(
				'active' => 'subjects',
				'fb_data' => $fb_data,
				'get_subj' => $this->db->get('subjects')->result(),
				);
			$this->load->view('admin/mngSubjects',$data);
		}

		public function insert_subjects()
		{
			$this->Model_main->insertSubjects();
			redirect('Welcome/mngsubjects','refresh');
		}

		public function delete_subj($value='')
		{
			$this->db->where('subj_id',$value);
			$this->db->delete('subjects');
			redirect('Welcome/mngsubjects','refresh');
		}

		public function update_subj()
		{
			$this->Model_main->update_subj();
			redirect('Welcome/mngsubjects','refresh');
		}

		public function get_ip()
		{
			echo $this->input->ip_address();
		}
	}
	?>