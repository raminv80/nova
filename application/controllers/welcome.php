<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			//redirect('/auth/login/');
			$this->view_data['is_logged_in'] = FALSE;
		} else {
			$this->view_data['is_logged_in'] = TRUE;
			$this->view_data['user_id']	= $this->tank_auth->get_user_id();
			$this->view_data['username']	= $this->tank_auth->get_username();
		}
		
		$this->load->view('template/header', $this->view_data);
		$this->load->view('welcome_message', $this->view_data);
		$this->load->view('template/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */