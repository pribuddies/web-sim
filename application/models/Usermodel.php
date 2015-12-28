<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}		

	public function getData()
	{
		return $this->db->get('user');
	}

	public function insert($datas)
	{
		return $this->db->insert('user', $datas);
	}

	function update($id,$datas)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $datas);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

}
