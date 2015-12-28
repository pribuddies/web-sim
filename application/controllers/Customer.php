<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('customermodel');
		//Do your magic here
	}	

	public function search()
	{
		// Data dari model
		$data['data'] 		= $this->customermodel->getData()->result_array();
	
		$data['content'] 	= 'customer/search';
		$this->load->view('layout', $data);
	}

	// Menggunakan Model
	public function create()
	{
		if ($this->input->post()) 
		{
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			// Jika validasi berhasil
			if ($this->form_validation->run() == FALSE) 
			{
				$data['content'] = 'customer/create';
				$this->load->view('layout', $data);
			} 
			else 
			{
				$datas = array(
						'name' 		=> $this->input->post('name'),
						'phone' 	=> $this->input->post('phone'),
						'address' 	=> $this->input->post('address')
					);

				$query = $this->customermodel->insert($datas);

				if ($query) 
				{
					$this->session->set_flashdata('info', 'Berhasil dimasukan');
					redirect('customer/search');
				}
			}
		}
		else
		{
			$data['content'] = 'customer/create';
			$this->load->view('layout', $data);
		}
	}

	public function update($idCustomer)
	{
		$id = $idCustomer;
		if ($this->input->post()) 
		{
			// validasi
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');

			// Jika validasi berhasil
			if ($this->form_validation->run() == FALSE) 
			{
				$data['editdata'] = $this->db->get_where('customer', array('id' => $id))->row();

				$data['content'] = 'customer/update';
				$this->load->view('layout', $data);
			}
			else
			{
				$datas = array(
						'name' 		=> $this->input->post('name'),
						'phone' 	=> $this->input->post('phone'),
						'address' 	=> $this->input->post('address')
					);

				// melempar data ke model
				$this->customermodel->update($id,$datas);
			
				if ($this->db->affected_rows()) 
				{
					$this->session->set_flashdata('info', 'Berhasil diupdate');
					redirect('customer/search');
				}
				else 
				{
					$this->session->set_flashdata('info', 'Gagal diupdate');
					redirect('customer/search');	
				}
			}

		}
		else
		{
			// Menampilkan data
			$data['editdata'] = $this->db->get_where('customer', array('id' => $id))->row();

			$data['content'] = 'customer/update';
			$this->load->view('layout', $data);
		}

	}

	public function delete($idCustomer)
	{
		$id = $idCustomer;
		$this->customermodel->delete($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', 'Berhasil dihapus');
			redirect('customer/search');
		}
		else 
		{
			$this->session->set_flashdata('info', 'Gagal dihapus');
			redirect('customer/search');	
		}
	}

	// Tanpa Menggunakan Model
	// public function create()
	// {

	// 	if ($this->input->post()) 
	// 	{
	// 		$this->form_validation->set_rules('name', 'Name', 'trim|required');
	// 		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
	// 		$this->form_validation->set_rules('address', 'Address', 'trim|required');

	// 		// Jika validasi berhasil
	// 		if ($this->form_validation->run() == FALSE) 
	// 		{
	// 			$data['content'] = 'customer/create';
	// 			$this->load->view('layout', $data);
	// 		} 
	// 		else 
	// 		{
	// 			$name = $this->input->post('name');
	// 			$phone = $this->input->post('phone');
	// 			$address = $this->input->post('address');

	// 			$object = array(
	// 					'name' 		=> $name,
	// 					'phone' 	=> $phone,
	// 					'address' 	=> $address
	// 				);

	// 			$query = $this->db->insert('customer', $object);

	// 			if ($query) 
	// 			{
	// 				$this->session->set_flashdata('info', 'Berhasil dimasukan');
	// 				redirect('customer/search');
	// 			}
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$data['content'] = 'customer/create';
	// 		$this->load->view('layout', $data);
	// 	}
	// }

}