<?php if (! defined('BASEPATH')) exit("No direct script access allowed");

class Login extends CI_model{

    public function __construct() {
        parent::__construct();
        // $config = array(
        //     'appId'  => '820131761362365',
        //     'secret' => 'bf4c7c0bb6b831d89391333b49c2084b',
        //     'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
        //     );

        // $this->load->library('facebook', $config);
        $this->load->library('facebook');

        $user = $this->facebook->getUser();

        // We may or may not have this data based on whether the user is logged in.
        //
        // If we have a $user id here, it means we know the user is logged into
        // Facebook, but we don't know if the access token is valid. An access
        // token is invalid if the user logged out of Facebook.
        $profile = null;
        if($user)
        {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $profile = $this->facebook->api('/me?fields=id,name,link,email,first_name,last_name,gender');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }

        $fb_data = array(
            'me' => $profile,
            'uid' => $user,
            'loginUrl' => $this->facebook->getLoginUrl(
                array(
                                'scope' => 'public_profile,email', // app permissions
                                'redirect_uri' => base_url(), // URL where you want to redirect your users after a successful login
                                )
                ),
            'logoutUrl' => $this->facebook->getLogoutUrl(),
            );

        $this->session->set_userdata('fb_data', $fb_data);
    }

    public function logout(){

        $this->load->library('facebook');

                // Logs off session from website
        $this->facebook->destroySession();
                // Make sure you destory website session as well.

        redirect('welcome','refresh');
    }
    /*
    public function get_news_id_userpost($fb_data){
       $get_news_userpost = $this->db->query('SELECT `users`.`user_first_name`, `users`.`user_facebook_id`, `users`.`user_last_name`, `news`.`news_id`, `news`.`news_title`, `news`.`news_detail`, `news`.`news_file_upload`, `news`.`news_date`, `news`.`news_post` FROM `news` INNER JOIN `users` ON `news`.`news_post` = `users`.`user_facebook_id` WHERE `news`.`news_post` = '.$fb_data['me']['id'].' ORDER BY `news`.`news_id` DESC');
       return $get_news_userpost->result();
   }

*/
   public function checkID_first($fb_data){
       $query_faceboo_id = $this->db->query("SELECT * FROM username WHERE user_fb =".$fb_data['me']['id'])->num_rows();

       return $query_faceboo_id;
   }

}
?>