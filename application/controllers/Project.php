<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('projectmodel');
		$this->load->model('customermodel');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}	

	public function search()
	{
		
		// Data dari model
		$data['data'] = $this->projectmodel->getAllData()->result_array();

		$data['content'] 	= 'project/search';
		
		$this->load->view('layout', $data);
	}

	public function create()
	{
		$data['dataCustomer'] = $this->customermodel->getData()->result_array();

		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('id_customer', 'Customer', 'trim|required');
			$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
			$this->form_validation->set_rules('start_project', 'Start Project', 'trim|required');
			$this->form_validation->set_rules('end_project', 'End Project', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			if ($this->form_validation->run() == FALSE) 
			{
				$data['content'] = 'project/create';
				$this->load->view('layout', $data);
			} 
			else 
			{
				$datas = array(
						'id_customer' 	=> $this->input->post('id_customer'),
						'project_name' 	=> $this->input->post('project_name'),
						'start_project' => $this->input->post('start_project'),
						'end_project' 	=> $this->input->post('end_project'),
						'status' 		=> $this->input->post('status'),
					);
		
				$query = $this->projectmodel->insert($datas);

				if ($query) 
				{
					$this->session->set_flashdata('info', 'Berhasil dimasukan');
					redirect('project/search');
				}
			}
		}
		else
		{
			$data['content'] = 'project/create';
			$this->load->view('layout', $data);	
		}
	}

	public function update($idProject)
	{
		if ($this->input->post()) 
		{
			// validasi
			$this->form_validation->set_rules('id_customer', 'Customer', 'trim|required');
			$this->form_validation->set_rules('project_name', 'Project Name', 'trim|required');
			$this->form_validation->set_rules('start_project', 'Start Project', 'trim|required');
			$this->form_validation->set_rules('end_project', 'End Project', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');

			// Jika validasi berhasil
			if ($this->form_validation->run() == FALSE) 
			{
				$data['editdata'] = $this->projectmodel->getCustomerProject($idProject)->row();

				$data['content'] = 'project/update';
				$this->load->view('layout', $data);
			}
			else
			{
				$datas = array(
						'id_customer' 	=> $this->input->post('id_customer'),
						'project_name' 	=> $this->input->post('project_name'),
						'start_project' => $this->input->post('start_project'),
						'end_project' 	=> $this->input->post('end_project'),
						'status' 		=> $this->input->post('status'),
					);

				// melempar data ke model
				$this->projectmodel->update($idProject,$datas);
			
				if ($this->db->affected_rows()) 
				{
					$this->session->set_flashdata('info', 'Berhasil diupdate');
					redirect('project/search');
				}
				else 
				{
					$this->session->set_flashdata('info', 'Gagal diupdate');
					redirect('project/search');	
				}
			}

		}
		else
		{
			// Menampilkan data customer
			$data['dataCustomer'] = $this->customermodel->getData()->result_array();
			
			// Menampilkan data project
			$data['editdata'] = $this->projectmodel->getCustomerProject($idProject)->row();

			// tidak menggunakan model
			// $data['editdata'] = $this->db->get_where('project', array('id' => $idProject))->row();

			$data['content'] = 'project/update';
			$this->load->view('layout', $data);
		}
	}

	public function delete($idCustomer)
	{
		$id = $idCustomer;
		$this->projectmodel->delete($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Berhasil dihapus');
			redirect('project/search');
		}
		else 
		{
			$this->session->set_flashdata('info', 'Gagal dihapus');
			redirect('project/search');	
		}
	}

}
