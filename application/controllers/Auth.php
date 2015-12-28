<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('model_user'); // load model_user
		// $this->load->library('form_validation');
		// $this->load->model('customermodel');
		//Do your magic here
	}

	public function index() {
		$this->load->view('index');
	}

	public function cek_login() {
		$data = array(
				'username' => $this->input->post('username', TRUE),
				'password' => md5($this->input->post('password', TRUE))
			);
		
		$hasil = $this->model_user->cek_user($data);

		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['uid'] = $sess->uid;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}

			
				
			if ($this->session->userdata('level')=='admin') {
				
				// $data['level'] = $this->session->userdata('level');
				// $data['content'] = 'admin/admin';
				// $this->load->view('layout', $data);
			}
			elseif ($this->session->userdata('level')=='member') {
				// $data['content'] = 'member/member';
				// $this->load->view('layout', $data);
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}

}

?>