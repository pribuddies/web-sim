<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}	

	public function index()
	{
		// if ($this->session->userdata('username')=="") {
		// 	redirect('auth');
		// }
		// $this->load->view('layout');

		$data['content'] = 'dashboard';
		$this->load->view('layout', $data);
	}

	public function berkata()
	{
		echo "berkata";
	}

	public function iniparam($param1=null,$param2='')
	{
		echo "ini adalah param 1 :".$param1." dan param2 :".$param2;
	}

	public function template()
	{
		$data['judul']	= "Judul Template";
		$data['head']	= "Heading Template";
		$data['isi']	= "Isi Template";

		$this->load->view('template', $data);
	}

}