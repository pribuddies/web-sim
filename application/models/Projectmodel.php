<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Projectmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// $this->load->db('customer');

	}		

	public function getAllData()
	{
		return $this->db->get('project');

		// $this->db->select('*');
		// $this->db->from('project');
		// $this->db->join('customer', 'customer.id = project.id');

		// $a = $this->db->get();


		// return $a;
	}

	public function getCustomerProject($idProject)
	{
		return $this->db->get_where('project', array('id' => $idProject));
		// $a = $this->db->get_where('project', array('id_customer' => $idProject));
		// echo "<pre>";
		// print_r($a->result_array());
		// exit();
	}

	public function insert($datas)
	{
		return $this->db->insert('project', $datas);
	}

	function update($idProject,$datas)
	{
		$this->db->where('id', $idProject);
		$this->db->update('project', $datas);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('customer');
	}

}
