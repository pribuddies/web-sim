<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Customermodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}		

	public function getData()
	{
		return $this->db->get('customer');
	}

	public function insert($datas)
	{
		return $this->db->insert('customer', $datas);
	}

	function update($id,$datas)
	{
		$this->db->where('id', $id);
		$this->db->update('customer', $datas);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('customer');
	}

}
