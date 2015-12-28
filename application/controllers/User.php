<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('usermodel');
		//Do your magic here
	}	

	public function search()
	{
		// Data dari model
		$data['data'] 		= $this->usermodel->getData()->result_array();
	
		$data['content'] 	= 'user/search';
		$this->load->view('layout', $data);
	}

	// Menggunakan Model
	public function create()
	{

		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			// Jika validasi berhasil
			if ($this->form_validation->run() == FALSE) 
			{
				$data['content'] = 'user/create';
				$this->load->view('layout', $data);
			} 
			else 
			{
				$datas = array(
						'username' 	=> $this->input->post('username'),
						'email' 	=> $this->input->post('email'),
						'password' 	=> md5($this->input->post('password'))
					);
		
				$query = $this->usermodel->insert($datas);

				if ($query) 
				{
					$this->session->set_flashdata('info', 'Berhasil dimasukan');
					redirect('user/search');
				}
			}
		}
		else
		{
			$data['content'] = 'user/create';
			$this->load->view('layout', $data);
		}
	}

	public function update($idUser)
	{
		$id = $idUser;
		if ($this->input->post()) 
		{
			// validasi
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			// Jika validasi berhasil
			if ($this->form_validation->run() == FALSE) 
			{
				$data['editdata'] = $this->db->get_where('user', array('id' => $id))->row();

				$data['content'] = 'user/update';
				$this->load->view('layout', $data);
			}
			else
			{
				$datas = array(
						'username' 	=> $this->input->post('username'),
						'email' 	=> $this->input->post('email'),
						'password' 	=> md5($this->input->post('password'))
					);

				// melempar data ke model
				$this->usermodel->update($id,$datas);
			
				if ($this->db->affected_rows()) 
				{
					$this->session->set_flashdata('info', 'Berhasil diupdate');
					redirect('user/search');
				}
				else 
				{
					$this->session->set_flashdata('info', 'Gagal diupdate');
					redirect('user/search');	
				}
			}

		}
		else
		{
			// Menampilkan data
			$data['editdata'] = $this->db->get_where('user', array('id' => $id))->row();

			$data['content'] = 'user/update';
			$this->load->view('layout', $data);
		}
	}

	public function delete($idUser)
	{
		$id = $idUser;
		$this->usermodel->delete($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Berhasil dihapus');
			redirect('user/search');
		}
		else 
		{
			$this->session->set_flashdata('info', 'Gagal dihapus');
			redirect('user/search');	
		}
	}

}